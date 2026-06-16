<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Session;
use Jenssegers\Agent\Agent;
use App\WhatCategory;
use Illuminate\Http\Request;
use function Monolog\toArray;
use PDF;
use Illuminate\Support\Facades\File;
use App\Models\Cover;

class CoverController extends Controller
{
    const COVER = 'Cover'; 

    public function __construct()
    {
        $this->middleware('auth');
    }

    function create()
    {
        $what_categories = WhatCategory::with(['covers' => function ($query) {
            $query->orderBy('image_order');
        }])->whereNotIn('id', [2, 6, 11, 12, 13, 14, 16])->get();
        $manualCategory = new WhatCategory([
            'id' => 0,
            'name' => 'Home',
            'french_name' => '',
        ]);
        $manualCategory2 = new WhatCategory(
        [
            'id' => 20,
            'name' => 'Who-We-Are',
            'french_name' => '',
        ]);
        $manualCategory3 = new WhatCategory([
            'id' => 40,
            'name' => 'Our News',
            'french_name' => '',
        ]);

        $manualCategory->setRelation('covers', Cover::where('what_category_id', 0)->orderBy('image_order')->get());
        $manualCategory2->setRelation('covers', Cover::where('what_category_id', 20)->orderBy('image_order')->get());
        $manualCategory3->setRelation('covers', Cover::where('what_category_id', 40)->orderBy('image_order')->get());
        $what_categories = $what_categories->push($manualCategory, $manualCategory2, $manualCategory3);
        return view('new.admin.cover', ['what_categories' => $what_categories]);
    }

    public function show($id)
    {
        $agent = new Agent();
        $images = Cover::where('what_category_id', $id)->orderBy('image_order', 'asc')->get();

        if ($id == 40) {
            return view('new.admin.cover-view', [
                'id' => $id,
                'images' => $images,
                'carouselImages' => $images,
                'tickerNews' => collect(),
                'importantNews' => null,
                'latestEdition' => false,
                'regularNews' => collect(),
                'pinnedNews' => collect(),
                'hasMore' => false
            ]);
        }

        $what_category = ($id != 0) ? WhatCategory::with('covers')->where('id', $id)->get() : null;

        return view('new.admin.cover-view', [
            'what_category' => $what_category,
            'images' => $images,
            'agent' => $agent
        ]);
    }

    public function store(Request $request)
    {
        $categoryId = $request->input('id');

        if ($categoryId == 0) {
            $categoryName = "Home";
        } elseif ($categoryId == 20) {
            $categoryName = "Who-We-Are";
        } elseif ($categoryId == 40) {
            $categoryName = "Our News"; // Fixed name mapping
        } else {
            $category = WhatCategory::find($categoryId);
            if (!$category) {
                return redirect()->back()->with('error', 'Category not found');
            }
            $categoryName = $category->name;
        }

        $images = new \MultipleIterator();

        if ($categoryId != 0) {
            $maxSize = ($categoryId == 40) ? 600 : 2048;
            $request->validate([
                'image.*' => 'required|image|mimes:jpeg,jpg|max:' . $maxSize,
                'caption' => 'nullable|string|max:255',
            ]);

            // If Category 40, delete old images to enforce single header rule
            if ($categoryId == 40) {
                $oldCovers = Cover::where('what_category_id', 40)->get();
                foreach($oldCovers as $old) {
                    $pathToDelete = $old->image_path; 
                    if(File::exists(public_path($pathToDelete))) {
                        File::delete(public_path($pathToDelete));
                    }
                    $old->delete();
                }
            }

            $files = $request->file('image');
            foreach ($files as $i => $image) {
                $imgName = (string)time() . $i;
                $path = 'images/home/' . $categoryName;

                if(!File::exists(public_path($path))) {
                    File::makeDirectory(public_path($path), 0777, true, true);
                }

                $image->move(public_path($path), $imgName . '.jpg');

                $Cover = new Cover();
                $Cover->what_category_id = $categoryId;
                $Cover->image_path = '/' . $path . '/' . $imgName . '.jpg';
                $Cover->caption = $request->input('caption');
                $Cover->save();
            }
        }
        else {
            $images->attachIterator(new \ArrayIterator($request->file('small_image')));
            $images->attachIterator(new \ArrayIterator($request->file('big_image')));

            foreach ($images as $i => $image) {
                $imgName = (string)time() . $i[0];
                $path = 'images/home/Cover';

                if(!File::exists(public_path($path))) {
                    File::makeDirectory(public_path($path), 0777, true, true);
                }

                $image[0]->move(public_path($path), $imgName . 'b.jpg');
                $image[1]->move(public_path($path), $imgName . '.jpg');

                $cover = new Cover;
                $cover->what_category_id = $categoryId;
                $cover->image_path = '/' . $path . '/' . $imgName  . 'b.jpg';
                $cover->caption = $request->input('caption');
                $cover->save();
            }
        }

        if(method_exists($this, 'saveToLog')) {
            if ($categoryId == 40) {
                // Changed from 'Images stored' to 'Header image stored'
                $this->saveToLog('Header', 0, 'Header image stored'); 
            } else {
                $this->saveToLog(self::COVER, $categoryId, 'Images stored');
            }
        }
    
        return redirect()->route('covers', ['tab' => $categoryName])
            ->with('success', 'Images stored');
    }

    public function destroy(Request $request, $id)
    {
        $images = Cover::where('what_category_id', $id)->get();
        $deletedImagesCount = 0;

        $selectedImages = $request->input('selected_images', []); // array of selected image IDs

        foreach ($images as $img) {
            if (isset($selectedImages[$img->id]) && $selectedImages[$img->id] == '1') {
                $deletedImagesCount++;
                // Delete file from disk
                if(File::exists(public_path($img->image_path))) {
                    File::delete(public_path($img->image_path));
                } elseif (isset($img->MPI_Path) && File::exists($img->MPI_Path)) {
                    File::delete($img->MPI_Path);
                }
                // Delete from database
                $img->delete();
            }
        }

        // Determine category name
        if ($id == 0) {
            $categoryName = "Home";
        } elseif ($id == 20) {
            $categoryName = 'Who-We-Are';
        } elseif ($id == 40) {
            $categoryName = 'Our News'; // Fixed name mapping
        } else{
            $category = WhatCategory::find($id);
            $categoryName = $category ? $category->name : 'Unknown';
        }

        if(method_exists($this, 'saveToLog')) {
            if ($id == 40) {
                // Changed from 'Images deleted' to 'Header image deleted'
                $this->saveToLog('Header', 0, $deletedImagesCount . ' Header image deleted'); 
            } else {
                $this->saveToLog(self::COVER, $id, $deletedImagesCount . ' Images deleted');
            }
        }

        return redirect()->route('covers', ['tab' => $categoryName])
            ->with('success', $deletedImagesCount . ' Images deleted');
    }

    public function order(Request $request)
    {
        $imageIdsArray = $request->input('imageIds');
        $categoryId = $request->input('what_category_id');

        $count = 1;
        foreach ($imageIdsArray as $id) {
            $image = Cover::where('id', $id)->where('what_category_id', $categoryId)->first();

            if ($image) {
                $image->image_order = $count;
                $image->save();
                $count++;
            }
        }
        
        if(method_exists($this, 'saveToLog')) {
            if ($categoryId == 40) {
                // Changed from 'Images reordered' to 'Header image reordered'
                $this->saveToLog('Header', 0, 'Header image reordered'); 
            } else {
                $this->saveToLog(self::COVER, $categoryId, 'Images reordered');
            }
        }
        return 'Images has been reordered !!';
    }

    // NEW METHOD TO UPDATE CAPTIONS VIA AJAX
    public function updateCaption(Request $request)
    {
        $request->validate([
            'image_id' => 'required|integer',
            'caption' => 'nullable|string|max:255'
        ]);

        $cover = Cover::find($request->image_id);
        if ($cover) {
            $cover->caption = $request->caption;
            $cover->save();
            return response()->json(['success' => true, 'caption' => $cover->caption]);
        }

        return response()->json(['success' => false], 404);
    }
}
