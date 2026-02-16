<?php

namespace App\Http\Controllers;

use App\Initiative;
use App\InitiativeImageRehabilitation;
use App\WhatCategory;
use Illuminate\Http\Request;
use File;

class InitiativeImagesRehabilitationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','english']);
    }

    public function create($id)
    {
        $initiative = Initiative::with('whatCategory')->where('id', $id)->first();
        $images = InitiativeImageRehabilitation::where('initiative_id', $id)->get();
        return view('new.admin.initiatives.images.create-rehabilitation', ['initiative' => $initiative, 'images' => $images]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'initiative_id' => 'required|numeric',
            'title' => 'required',
            'what_category_id' => 'required',
            'before_image' => 'mimes:jpeg|max:500',
            'after_image' => 'mimes:jpeg|max:500',
        ]);
        $categoryName = WhatCategory::find($request->input('what_category_id'))->name;
        $imgName = (string)time();
        $path = '/initiatives/' . $categoryName . '/' . $request->input('title') . '/';
        $request->file('before_image')->move(public_path($path), $imgName . 'before.jpg');
        $request->file('after_image')->move(public_path($path), $imgName . 'after.jpg');
        $initiativeImageRehabilitation = new InitiativeImageRehabilitation();
        $initiativeImageRehabilitation->initiative_id = $request->input('initiative_id');
        $initiativeImageRehabilitation->path_1 = '/'.public_path($path) . $imgName . 'before.jpg';
        $initiativeImageRehabilitation->path_2 = '/'.public_path($path) . $imgName . 'after.jpg';
        $initiativeImageRehabilitation->save();
        $this->saveToLog(self::INITIATIVES, $request->input('initiative_id'), 'Before & After Images stored');
        return redirect('admin/initiatives/images/rehabilitation/'.$request->input('initiative_id'))->with('success', 'Before & After Images stored');
    }

    public function destroy(Request $request, $id)
    {
        $rehabilitationImages = InitiativeImageRehabilitation::where('initiative_id', $id)->get();
        $deletedImagesCount = 0;
        foreach ($rehabilitationImages as $images) {
            if ($request->input($images->id) == '1') {
                $images->delete();
                File::delete(public_path($images->path_1), public_path($images->path_2));
            }
            $deletedImagesCount++;
        }
        $this->saveToLog(self::INITIATIVES, $id,$deletedImagesCount . ' Before & After Images deleted');
        return redirect('admin/initiatives/images/rehabilitation/'.$id)->with('success', $deletedImagesCount . ' Before & After Images deleted');
    }
}
