<?php

namespace App\Http\Controllers;

use App\Initiative;
use App\InitiativeImage;
use App\WhatCategory;
use Illuminate\Http\Request;
use Validator;
use File;

class InitiativeImagesController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['auth','english']);
        $this->middleware(['auth']);
    }

    public function create($id)
    {
        $initiative = Initiative::with('whatCategory')->where('id', $id)->first();
        $images = InitiativeImage::where('initiative_id', $id)->get();
        return view('new.admin.initiatives.images.create', ['initiative' => $initiative, 'images' => $images]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'initiative_id' => 'required|numeric',
            'title' => 'required',
            'what_category_id' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
            'small_image' => 'max:' . count($request->file('big_image')),
        ]);
        if ($validator->fails()) {
            return redirect('/admin/initiatives/images/create/' . $request->input('initiative_id'))
                ->withErrors('the number of small images must be the same as the number of big images')
                ->withInput();
        }
        foreach (range(0, count($request->file('small_image')) - 1) as $i) {
            $request->validate([
                'small_image.' . $i => 'mimes:jpeg|max:200'
            ]);
        }
        foreach (range(0, count($request->file('big_image')) - 1) as $i) {
            $request->validate([
                'big_image.' . $i => 'mimes:jpeg|max:600|min:250'
            ]);
        }
        $categoryName = WhatCategory::find($request->input('what_category_id'))->name;
        $images = new \MultipleIterator();
        $images->attachIterator(new \ArrayIterator($request->file('small_image')));
        $images->attachIterator(new \ArrayIterator($request->file('big_image')));
        foreach ($images as $i => $image) {
            $imgName = (string)time() . $i[0];
            $path = 'images/initiatives/' . $categoryName . '/' . $request->input('title') . '/';
            $image[0]->move($path, $imgName . '.jpg');
            $image[1]->move($path, $imgName . 'b.jpg');
            $initiativeImage = new InitiativeImage();
            $initiativeImage->initiative_id = $request->input('initiative_id');
            $initiativeImage->path = '/'.$path . $imgName . '.jpg';
            $initiativeImage->save();
        }
        $this->saveToLog(self::INITIATIVES, $request->input('initiative_id'), count($request->file('small_image')) . ' Images stored');
        return redirect('admin/initiatives/images/'.$request->input('initiative_id'))
            ->with('success', count($request->file('small_image')) . ' Images stored');
    }

    public function destroy(Request $request, $id)
    {
        $images = InitiativeImage::where('initiative_id', $id)->get();
        $deletedImagesCount = 0;
        foreach ($images as $img) {
            if ($request->input($img->id) == '1') {
                $deletedImagesCount++;
                $img->delete();
                File::delete($img->path);
                File::delete(substr($img->path, 0, -4).'b.jpg');
            }
        }
        $this->saveToLog(self::INITIATIVES, $id,$deletedImagesCount . ' Images deleted');
        return redirect('admin/initiatives/images/'.$id)->with('success', $deletedImagesCount . ' Images deleted');
    }

    public function order_images(Request $request){
        $imageIdsArray = $request->input('imageIds');
        $count = 1;
        foreach ($imageIdsArray as $id) {
            $image = InitiativeImage::find($id);
            $image->image_order = $count;
            $image->save();
            $count ++;
        }
        return 'Images has been reordered !!';
    }
}
