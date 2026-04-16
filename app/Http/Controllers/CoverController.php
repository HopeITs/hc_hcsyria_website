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

        $manualCategory->setRelation('covers', Cover::where('what_category_id', 0)->orderBy('image_order')->get());
        $manualCategory2->setRelation('covers', Cover::where('what_category_id', 20)->orderBy('image_order')->get());
        $what_categories = $what_categories->push($manualCategory, $manualCategory2);
        return view('new.admin.cover', ['what_categories' => $what_categories]);
    }

    function show($id)
    {
        $agent = new Agent();
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        if($id != 0){
            $what_category = WhatCategory::with('covers')->where('id', $id)->get();

        if (count($what_category) == 0) {
            return view('new.errors.404');
        }
        }
        else $what_category = null;
        $images = Cover::where('what_category_id', $id)->orderby('image_order', 'asc')->get();
        return view('new.admin.cover-view', ['what_category' => $what_category, 'images' => $images, 'agent' => $agent]);
    }

    public function store(Request $request)
    {

        if ($request->input('id') != 0) {
            $categoryName = WhatCategory::find($request->input('id'))->name;
        } else {
            $categoryName = "Home";
        }
        $categoryId = $request->input('id');
        $images = new \MultipleIterator();

        if ($categoryId != 0) {
            $request->validate([
                'image.*' => 'required|image|mimes:jpeg,jpg|max:4096', // 4MB
            ]);
            $images->attachIterator(new \ArrayIterator($request->file('image')));
            foreach ($images as $i => $image) {
                $imgName = (string)time() . $i[0];
                $path = '/images/home/' . $categoryName;
                $image[0]->move($path, $imgName . '.jpg');
                $Cover = new Cover();
                $Cover->what_category_id = $categoryId;
                $Cover->image_path = $path . '/' . $imgName . '.jpg';
                $Cover->save();
            }
        } else {
            $request->validate([
                'small_image_home.*' => 'required|image|mimes:jpeg,jpg|max:2048', // 2MB
                'big_image_home.*'   => 'required|image|mimes:jpeg,jpg|max:5120', // 5MB
            ]);
            $smallImages = $request->file('small_image_home');
            $bigImages = $request->file('big_image_home');

            if (!$smallImages || !$bigImages) {
                dd('No files uploaded');
            }

            foreach ($smallImages as $i => $smallImage) {
                $bigImage = $bigImages[$i] ?? null;

                if (!$smallImage || !$bigImage) continue;

                $imgName = time() . $i;
                $path = public_path('/images/home/Cover/');

                $smallImage->move($path, $imgName . '.jpg');
                $bigImage->move($path, $imgName . 'b.jpg');

                $Cover = new Cover();
                $Cover->what_category_id = $categoryId;
                $Cover->image_path = '/images/home/Cover/' . $imgName . 'b.jpg';
                $Cover->save();
            }
        }

        $this->saveToLog(self::COVER, $categoryId, 'Images stored');

        if($categoryId != 0 ){
            return redirect()->route('covers', ['tab' => $categoryName])
                ->with('success', count($request->file('image')) . ' Images stored');
        }
        else{
            return redirect()->route('covers', ['tab' => $categoryName])
                ->with('success', count($request->file('small_image_home')) . ' Images stored');
        }
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
                File::delete($img->MPI_Path);
                // Delete from database
                $img->delete();
            }
        }

        // Determine category name
        if ($id == 0) {
            $categoryName = "Home";
        } elseif ($id == 20) {
            $categoryName = 'Who-We-Are';
        } else {
            $category = WhatCategory::find($id);
            $categoryName = $category ? $category->name : 'Unknown';
        }

        $this->saveToLog(self::COVER, $id, $deletedImagesCount . ' Images deleted');

        return redirect()->route('covers', ['tab' => $categoryName])
            ->with('success', $deletedImagesCount . ' Images deleted');
    }

    public function order(Request $request)
    {
        $imageIdsArray = $request->input('imageIds');
        $categoryId = $request->input('what_category_id');
//        if (!$categoryId || !is_array($imageIdsArray)) {
//            return response()->json('Invalid data.', 422);
//        }

        $count = 1;
        foreach ($imageIdsArray as $id) {
            $image = Cover::where('id', $id)->where('what_category_id', $categoryId)->first();

            if ($image) {
                $image->image_order = $count;
                $image->save();
                $count++;
            }
        }
        $this->saveToLog(self::COVER, $id, $categoryId . ' Images reordered');
        return 'Images has been reordered !!';
    }
}
