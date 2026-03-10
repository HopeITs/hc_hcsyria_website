<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use function Laravel\Prompts\select;
use Session;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Arr;
use App\Donor;
use App\YouthProfile;
use App\InitiativeImage;
use App\InitiativeImageRehabilitation;
use App\NewsImage;
use App\Place;
use App\StudyzoneCenter;
use App\SubWhatCategory;
use App\Success;
use App\Testimony;
use App\WhatCategory;
use App\News;
use App\Edition;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use App\Project;
use App\Initiative;
use Illuminate\Support\Facades\DB;
use App\WhoCategory;
use Illuminate\Support\Facades\Route;
use function Monolog\toArray;
use App\Mail\UserSubscribedEmail;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Location\Facades\Location;
use PDF;
use File;
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
//        foreach (range(0, count($request->file('image')) - 1) as $i) {
//            $request->validate([
//                'image.' . $i => 'mimes:jpeg|max:200'
//            ]);
//        }
        if ($request->input('id') != 0) {
            $categoryName = WhatCategory::find($request->input('id'))->name;
        } else {
            $categoryName = "Home";
        }
        $categoryId = $request->input('id');
        $images = new \MultipleIterator();

        if ($categoryId != 0) {
            $images->attachIterator(new \ArrayIterator($request->file('image')));
            foreach ($images as $i => $image) {
                $imgName = (string)time() . $i[0];
                $path = '/images/home/' . $categoryName;
                $image[0]->move(public_path($path), $imgName . '.jpg');
                $Cover = new Cover();
                $Cover->what_category_id = $categoryId;
                $Cover->image_path = $path . '/' . $imgName . '.jpg';
                $Cover->save();
            }
        } else {
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
            $images->attachIterator(new \ArrayIterator($request->file('small_image')));
            $images->attachIterator(new \ArrayIterator($request->file('big_image')));
            foreach ($images as $i => $image) {
                $imgName = (string)time() . $i[0];
                $path = '/images/home/';
                $image[0]->move(public_path($path), $imgName . '.jpg');
                $image[1]->move(public_path($path), $imgName . 'b.jpg');
                $Cover = new Cover();
                $Cover->what_category_id = $categoryId;
                $Cover->image_path = $path . '/' . $imgName . 'b.jpg';
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
                ->with('success', count($request->file('small_image')) . ' Images stored');
        }


    }

    public function destroy(Request $request, $id)
    {
        $images = Cover::where('what_category_id', $id)->get();
        $deletedImagesCount = 0;
        foreach ($images as $img) {
            if ($request->input($img->id) == '1') {
                $deletedImagesCount++;
                $img->delete();
                File::delete(public_path($img->image_path));
            }
        }

            if($id == 0) {
                $categoryName = "Home";
            }else if($id == 20){
                $categoryName = 'Who-We-Are';
            }
            else{
                $categoryName = WhatCategory::find($id)->name;
            }


        $this->saveToLog(self::COVER, $id, $deletedImagesCount . ' Images deleted');
        return redirect()->route('covers', ['tab' => $categoryName])->
           with('success', $deletedImagesCount . ' Images deleted');
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
