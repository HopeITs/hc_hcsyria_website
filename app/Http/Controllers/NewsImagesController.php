<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsImage;
use App\WhatCategory;
use Illuminate\Http\Request;
use Validator;
use File;

class NewsImagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function create($id)
    {
        $news = News::with('whatCategory')->where('id', $id)->first();
        $images = NewsImage::where('news_id', $id)->orderby('image_order')->get();
        return view('new.admin.news.images.create', [
            'news' => $news,
            'images' => $images
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'news_id' => 'required|numeric',
            'title' => 'required',
            'what_category_id' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
            'small_image' => 'max:' . count($request->file('big_image')),
        ]);
        if ($validator->fails()) {
            return redirect('/admin/news/images/create/' . $request->input('news_id'))
                ->withErrors('the number of small images must be the same as the number of big images')
                ->withInput();
        }
        foreach (range(0, count($request->file('small_image')) - 1) as $i) {
            $request->validate([
                'small_image.' . $i => 'mimes:jpeg|max:500'
            ]);
        }
        foreach (range(0, count($request->file('big_image')) - 1) as $i) {
            $request->validate([
                'big_image.' . $i => 'mimes:jpeg|max:600'
            ]);
        }
        $categoryName = WhatCategory::find($request->input('what_category_id'))->name;
        $images = new \MultipleIterator();
        $images->attachIterator(new \ArrayIterator($request->file('small_image')));
        $images->attachIterator(new \ArrayIterator($request->file('big_image')));
        foreach ($images as $i => $image) {
            $imgName = (string)time() . $i[0];

//            $titleCut = substr($request->input('title'), 0, 7);
            $news_id = $request->input('news_id');

            $path = '/news/' . $categoryName . '/' . $news_id . '/';
            $image[0]->move(public_path($path), $imgName . '.jpg');
            $image[1]->move(public_path($path), $imgName . 'b.jpg');
            $newsImage = new NewsImage();
            $newsImage->news_id = $request->input('news_id');
            $newsImage->path = '/'.public_path($path) . $imgName . '.jpg';
            $newsImage->save();
        }
        $this->saveToLog(self::NEWS, $request->input('news_id'), count($request->file('small_image')) . ' Images stored');
        return redirect('admin/news/images/'.$request->input('news_id'))->with('success', count($request->file('small_image')) . ' Images stored');
    }

    public function destroy(Request $request, $id)
    {
        $images = NewsImage::where('news_id', $id)->get();
        $deletedImagesCount = 0;
        foreach ($images as $img) {
            if ($request->input($img->id) == '1') {
                $deletedImagesCount++;
                $img->delete();
                File::delete(public_path($img->path));
                File::delete(public_path(substr($img->path, 0, -4).'b.jpg'));
            }
        }
        $this->saveToLog(self::NEWS, $id,$deletedImagesCount . ' Images deleted');
        return redirect('admin/news/images/'.$id)->with('success', $deletedImagesCount . ' Images deleted');
    }

    public function order_images(Request $request){
        $imageIdsArray = $request->input('imageIds');
        $count = 1;
        foreach ($imageIdsArray as $id) {
            $image = NewsImage::find($id);
            $image->image_order = $count;
            $image->save();
            $count ++;
        }
        return 'Images has been reordered !!';
    }

}
