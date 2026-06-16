<?php

namespace App\Http\Controllers;

use Validator;
use App\Success;
use App\SuccessEnglish;
use App\SuccessFrench;
use App\Donor;
use App\Project;
use App\Initiative;
use App\InitiativeEnglish;
use App\InitiativeFrench;
use App\InitiativeImage;
use App\InitiativeImageRehabilitation;
use App\Place;
use App\StudyzoneCenter;
use App\SubWhatCategory;
use App\Testimony;
use App\WhatCategory;
use App\WhoCategory;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $iniLEAP = Initiative::with('english', 'place')->where('what_category_id', '19')->where('online', '1')->get();

        $iniPending = Initiative::with('english', 'whatCategory', 'place', 'center', 'images')->where('what_category_id', '19')->where('online', '0')->get();
        $places = Place::All();


        return view('new.admin.leap.index', ['iniLEAP' => $iniLEAP, 'iniPending' => $iniPending, 'places' => $places

        ]);
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $initiative = Initiative::with('english')->where('id', $id)->first();
        if (!isset($initiative)) {
            return view('new.errors.404');
        }
        $images = InitiativeImage::where('initiative_id', $id)->orderby('image_order')->get();
        return view('new.admin.leap.view', ['initiative' => $initiative, 'images' => $images]);
    }

    public function edit($id)
    {
        $initiative = Initiative::with('english', 'donors')->where('id', $id)->first();
        $what_categories = WhatCategory::all();
        $who_categories = WhoCategory::all();
        $donors = Donor::all();
        $places = Place::all();
        $ini_donors = [];
        foreach ($initiative['donors'] as $i) {
            array_push($ini_donors, $i->id);
        }

        return view('new.admin.leap.edit', ['initiative' => $initiative, 'what_categories' => $what_categories, 'who_categories' => $who_categories, 'donors' => $donors, 'places' => $places,  'ini_donors' => $ini_donors]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['donors' => 'required', 'title' => 'required|max:70', 'organization' => 'max:70', 'date_string' => 'max:100', 'video' => 'max:100', 'logo' => 'max:150', 'description' => 'max:400', 'content' => 'required', 'place' => 'required', 'who_category_id' => 'required|numeric']);

        $initiative = Initiative::find($id);
        $initiativePrev = Initiative::find($id);
        if ($request->hasFile('logo')) {
            if ($initiative->logo != '0') {
                File::delete($initiative->logo);
            }
            $imgName = (string)time();
            $iniCategory = DB::table('what_categories')->where('id', 19)->get()->pluck('name')[0];
            $path = '/images/initiatives/' . $iniCategory . '/';
            $imgExt = $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($path, $imgName . '.' . $imgExt);
            $initiative->logo = $path . $imgName . '.' . $imgExt;
            $this->saveToLog(self::INITIATIVES, $id, 'Logo changed');
        }
        $initiative->video = $request->filled('video') ? $request->input('video') : '0';
        if ($initiative->isDirty('video')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Video Edited', $initiativePrev->video, $initiative->video);
        }
        if ($initiative->isDirty('donor_id')) {
            $previousDonor = Donor::find($initiativePrev->donor_id)->name;
            $newDonor = Donor::find($request->input('donor'))->name;
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Donor Edited', $previousDonor, $newDonor);
        }

        $initiative->place_id = $request->input('place');

        $initiative->who_category_id = $request->input('who_category_id');
        if ($initiative->isDirty('who_category_id')) {
            $iniCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
            if ($initiativePrev->who_category_id != Null){
                $iniCategoryPrev = DB::table('who_categories')->where('id', $initiativePrev->who_category_id)->get()->pluck('name')[0];
                $this->saveToLogWithData(self::INITIATIVES, $id, 'Serve category changed', $iniCategoryPrev, $iniCategory);
            }

        }

        $initiative->save();
        $engInitiative = InitiativeEnglish::where('initiative_id', $id)->first();
        $engInitiativePrev = InitiativeEnglish::where('initiative_id', $id)->first();
        $engInitiative->title = $request->input('title');
        $initiative->place_id = $request->input('place');


        if ($engInitiative->isDirty('title')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Title edited', $engInitiativePrev->title, $engInitiative->title);
        }
        $engInitiative->organization = $request->filled('organization') ? $request->input('organization') : '0';
        if ($engInitiative->isDirty('organization')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Organization edited', $engInitiativePrev->organization, $engInitiative->organization);
        }
        $engInitiative->date_string = $request->filled('date_string') ? $request->input('date_string') : '0';
        if ($engInitiative->isDirty('date_string')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'date edited', $engInitiativePrev->date_string, $engInitiative->date_string);
        }
        $engInitiative->description = $request->filled('description') ? $request->input('description') : '0';
        if ($engInitiative->isDirty('description')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'description edited', $engInitiativePrev->description, $engInitiative->description);
        }
        $engInitiative->content = $request->input('content');
        if ($engInitiative->isDirty('content')) {
            $this->saveToLogWithData(self::INITIATIVES, $id, 'Content edited', $engInitiativePrev->content, $engInitiative->content);
        }
        $engInitiative->save();
        $donorsSync = $initiative->donors()->sync(array_map('intval', $request->input('donors')));
        foreach ($donorsSync['attached'] as $donor_id) {
            $this->saveToLog(self::INITIATIVES, $id, 'Donor ' . Donor::find($donor_id)->name . ' attached');
        }
        foreach ($donorsSync['detached'] as $donor_id) {
            $this->saveToLog(self::INITIATIVES, $id, 'Donor ' . Donor::find($donor_id)->name . ' detached');
        }
        return redirect('admin\home')->with('success', 'Initiative ' . $initiative->id . ' has been updated');
    }

    public function create()
    {
        $who_categories = WhoCategory::all();
        $donors = Donor::all();
        $places = Place::all();

        return view('new.admin.leap.create', ['who_categories' => $who_categories, 'donors' => $donors, 'places' => $places]);

    }

    public function store(Request $request)
    {
        $request->validate(['donors' => 'required', 'title' => 'required|max:70', 'organization' => 'max:70', 'date_string' => 'max:100', 'video' => 'max:100', 'logo' => 'max:1190', 'description' => 'max:400', 'content' => 'required', 'who_category_id' => 'required|numeric', 'place' => 'required']);

        $initiative = new Initiative;
        if ($request->hasFile('logo')) {
            $imgName = (string)time();
            $iniCategory = DB::table('what_categories')->where('id', 19)->get()->pluck('name')[0];
            $path = '/images/initiatives/' . $iniCategory . '/' . $request->input('title') . '/';
            $imgExt = $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($path, $imgName . '.' . $imgExt);
            $initiative->logo = $path . $imgName . '.' . $imgExt;
        }
        $initiative->video = $request->filled('video') ? $request->input('video') : '0';
        $initiative->what_category_id = 19;
        $initiative->who_category_id = $request->input('who_category_id');
        $initiative->place_id = $request->input('place');
        $initiative->save();
        $engInitiative = new InitiativeEnglish;
        $engInitiative->initiative_id = $initiative->id;
        $engInitiative->title = $request->input('title');
        $engInitiative->organization = $request->filled('organization') ? $request->input('organization') : '0';
        $engInitiative->date_string = $request->filled('date_string') ? $request->input('date_string') : '0';
        $engInitiative->description = $request->filled('description') ? $request->input('description') : '0';
        $engInitiative->content = $request->input('content');
        $engInitiative->save();
        $initiative->donors()->attach(array_map('intval', $request->input('donors')));
        $this->saveToLog(self::INITIATIVES, $initiative->id, 'Initiative Created');
        return redirect()->back()->with('success', 'Initiative ' . $initiative->id . ' has been created');
    }

    public function delete($id)
    {
        $initiative = Initiative::find($id);
        Initiative::destroy($id);
        InitiativeEnglish::where('initiative_id', $id)->delete();
        InitiativeFrench::where('initiative_id', $id)->delete();
        File::delete($initiative->logo);
        $images = InitiativeImage::where('initiative_id', $id)->get();
        InitiativeImage::where('initiative_id', $id)->delete();
        foreach ($images as $image) {
            File::delete($image->path, substr($image->path, 0, -4) . 'b.jpg');
        }
        $this->saveToLog(self::INITIATIVES, $id, 'Initiative deleted');
        return redirect()->back()->with('success', 'Initiative ' . $id . ' deleted successfully');
    }

    public function publish(Request $request)
    {
        $initiative = Initiative::find($request->input('id'));
        $initiative->online = '1';
        $initiative->save();
        return redirect('admin/home')->with('success', 'Initiative ' . $request->input('id') . ' is online');
    }

    public function unpublish(Request $request)
    {
        $initiative = Initiative::find($request->input('id'));
        $initiative->online = '0';
        $initiative->save();
        return redirect()->back()->with('success', 'Initiative ' . $request->input('id') . ' is offline');
    }

    ////////////////// Image Section /////////////////
    public function add_image($id)
    {
        $initiative = Initiative::with('whatCategory')->where('id', $id)->first();
        $images = InitiativeImage::where('initiative_id', $id)->orderby('image_order')->get();
        return view('new.admin.leap.images.create', ['initiative' => $initiative, 'images' => $images]);
    }

    public function store_image(Request $request)
    {
        $request->validate(['initiative_id' => 'required|numeric', 'title' => 'required',//            'what_category_id' => 'required',
        ]);
        $validator = Validator::make($request->all(), ['small_image' => 'max:' . count($request->file('big_image')),]);
        if ($validator->fails()) {
            return redirect('/admin/initiatives/images/create/' . $request->input('initiative_id'))->withErrors('the number of small images must be the same as the number of big images')->withInput();
        }
        foreach (range(0, count($request->file('small_image')) - 1) as $i) {
            $request->validate(['small_image.' . $i => 'mimes:jpeg|max:200']);
        }
        foreach (range(0, count($request->file('big_image')) - 1) as $i) {
            $request->validate(['big_image.' . $i => 'mimes:jpeg|max:600|min:250']);
        }
        $categoryName = 19;
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
        return redirect()->back()->with('success', count($request->file('small_image')) . ' Images stored');
    }

    Public function delete_images(Request $request, $id)
    {
        $images = InitiativeImage::where('initiative_id', $id)->get();
        $deletedImagesCount = 0;
        foreach ($images as $img) {
            if ($request->input($img->id) == '1') {
                $deletedImagesCount++;
                $img->delete();
                File::delete($img->path);
                File::delete(substr($img->path, 0, -4) . 'b.jpg');
            }
        }
        $this->saveToLog(self::INITIATIVES, $id, $deletedImagesCount . ' Images deleted');
        return redirect('admin/leap/images/' . $id)->with('success', $deletedImagesCount . ' Images deleted');
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
