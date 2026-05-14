<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsImage;
use App\WhatCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create($id)
    {
        $news = News::with('whatCategory')->where('id', $id)->firstOrFail();
        $images = NewsImage::where('news_id', $id)->orderBy('image_order')->get();

        return view('new.admin.news.images.create', [
            'news' => $news,
            'images' => $images,
            'hasImportant' => News::where('priority_status', 1)->where('id', '!=', $id)->exists(),
            'hasPinned'    => News::where('priority_status', 2)->where('id', '!=', $id)->exists(),
        ]);
    }

    public function store(Request $request)
    {
        $news = News::with('whatCategory')->findOrFail($request->input('news_id'));
        $categoryName = $news->whatCategory ? $news->whatCategory->name : 'Uncategorized';
        $path = 'images/news/' . $categoryName . '/' . $news->id . '/';

        $request->validate([
            'news_id'         => 'required|numeric',
            'thumbnail_image' => 'required|image|mimes:jpeg,jpg',
            'important_image' => 'nullable|image|mimes:jpeg,jpg',
            'pinned_image'    => 'nullable|image|mimes:jpeg,jpg',
        ]);

        if ($request->has('is_important')) {
            $exists = News::where('priority_status', 1)->where('id', '!=', $news->id)->exists();
            if ($exists) {
                return redirect()->back()->with('placement_error', 'Upload failed: Another news article is already set as Important. Please unmark it first.');
            }
            $news->priority_status = 1;
            $this->cleanUpOldSpecialImages($news->id, 2);

        } elseif ($request->has('is_pinned')) {
            $exists = News::where('priority_status', 2)->where('id', '!=', $news->id)->exists();
            if ($exists) {
                return redirect()->back()->with('placement_error', 'Upload failed: Another news article is already set as Pinned. Please unmark it first.');
            }
            $news->priority_status = 2;
            $this->cleanUpOldSpecialImages($news->id, 1);

        } else {
            $news->priority_status = 0;
            $this->cleanUpOldSpecialImages($news->id, 1);
            $this->cleanUpOldSpecialImages($news->id, 2);
        }

        $news->save(); // Save the priority status immediately!

        $uploadedCount = 0;

        if ($request->hasFile('thumbnail_image')) {
            $imgName = time() . '_thumb';
            $request->file('thumbnail_image')->move($path, $imgName . '.jpg');

            $newsImage = new NewsImage();
            $newsImage->news_id = $news->id;
            $newsImage->path = '/' . $path . $imgName . '.jpg';
            $newsImage->sizetype = 0; // Sizetype 0
            $newsImage->save();
            $uploadedCount++;
        }

        if ($request->hasFile('important_image')) {
            $imgName = time() . '_important';
            $request->file('important_image')->move($path, $imgName . '.jpg');

            $newsImage = new NewsImage();
            $newsImage->news_id = $news->id;
            $newsImage->path = '/' . $path . $imgName . '.jpg';
            $newsImage->sizetype = 1; // Sizetype 1
            $newsImage->save();
            $uploadedCount++;
        }

        if ($request->hasFile('pinned_image')) {
            $imgName = time() . '_pinned';
            $request->file('pinned_image')->move($path, $imgName . '.jpg');

            $newsImage = new NewsImage();
            $newsImage->news_id = $news->id;
            $newsImage->path = '/' . $path . $imgName . '.jpg';
            $newsImage->sizetype = 2; // Sizetype 2
            $newsImage->save();
            $uploadedCount++;
        }

        if ($request->hasFile('small_image') && $request->hasFile('big_image')) {
            $smallImages = $request->file('small_image');
            $bigImages = $request->file('big_image');

            if(count($smallImages) === count($bigImages)) {
                foreach ($smallImages as $i => $smallImg) {
                    if (!isset($smallImages[$i]) || !isset($bigImages[$i])) continue;

                    $imgName = time() . '_reg_' . $i;
                    $smallImages[$i]->move($path, $imgName . '.jpg');
                    $bigImages[$i]->move($path, $imgName . 'b.jpg');

                    $newsImage = new NewsImage();
                    $newsImage->news_id = $news->id;
                    $newsImage->path = '/' . $path . $imgName . '.jpg';
                    $newsImage->sizetype = 3; // Sizetype 3
                    $newsImage->save();

                    $uploadedCount++;
                }
            }
        }

        $this->saveToLog(self::NEWS, $news->id, $uploadedCount . ' Images stored');
        return redirect()->route('news.index', ['tab' => 'Article'])
            ->with('success', $uploadedCount . ' Images successfully uploaded and mapped.');
    }

    public function destroy(Request $request, $id)
    {
        $images = NewsImage::where('news_id', $id)->get();
        $deletedImagesCount = 0;
        $news = News::find($id);

        foreach ($images as $img) {
            if ($request->input($img->id) == '1') {

                if ($img->sizetype == 1 && $news->priority_status == 1) {
                    $news->priority_status = 0;
                    $news->save();
                } elseif ($img->sizetype == 2 && $news->priority_status == 2) {
                    $news->priority_status = 0;
                    $news->save();
                }

                $deletedImagesCount++;
                File::delete(public_path($img->path));

                if ($img->sizetype == 3) {
                    File::delete(public_path(substr($img->path, 0, -4) . 'b.jpg'));
                }

                $img->delete();
            }
        }

        $this->saveToLog(self::NEWS, $id, $deletedImagesCount . ' Images deleted');
        return redirect()->route('news.index', ['tab' => 'Article'])
            ->with('success', $deletedImagesCount . ' Images deleted');
    }

    private function cleanUpOldSpecialImages($news_id, $sizetype)
    {
        $oldImages = NewsImage::where('news_id', $news_id)->where('sizetype', $sizetype)->get();
        foreach ($oldImages as $oldImg) {
            if (File::exists(public_path($oldImg->path))) {
                File::delete(public_path($oldImg->path));
            }
            $oldImg->delete();
        }
    }
}
