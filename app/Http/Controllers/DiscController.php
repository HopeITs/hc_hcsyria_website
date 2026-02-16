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

class DiscController extends Controller
{
    public function index()
    {
        $iniDisc = Initiative::with('english', 'place')->where('what_category_id', '5')->where('online', '1')->get();

        $iniPending = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '5')->where('online', '0')->get();
        $places = Place::All();
        $sucdisc = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '5')->where('sub_what_category_id', '16')->where('online', '1')->get();
        $sucpending = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '5')->where('online', '0')->get();

        return view('new.admin.disc.index', ['iniDisc' => $iniDisc, 'iniPending' => $iniPending, 'places' => $places, 'sucdisc' => $sucdisc, 'sucpending' => $sucpending,

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
        $imagesRehabilitation = InitiativeImageRehabilitation::where('initiative_id', $id)->get();
        $testimonies = Testimony::with('english', 'french')->where('initiative_id', $id)->get();
        return view('new.admin.disc.view', ['initiative' => $initiative, 'images' => $images, 'imagesRehabilitation' => $imagesRehabilitation, 'testimonies' => $testimonies,]);
    }

    public function edit($id)
    {
        $initiative = Initiative::with('english', 'donors')->where('id', $id)->first();
        $what_categories = WhatCategory::all();
        $who_categories = WhoCategory::all();
        $disc_sub_categories = SubWhatCategory::where('what_category_id', 5)->get();
        $donors = Donor::all();
        $places = Place::all();
        $ini_donors = [];
        foreach ($initiative['donors'] as $i) {
            array_push($ini_donors, $i->id);
        }

        return view('new.admin.disc.edit', ['initiative' => $initiative, 'what_categories' => $what_categories, 'who_categories' => $who_categories, 'donors' => $donors, 'places' => $places, 'disc_sub_categories' => $disc_sub_categories, 'ini_donors' => $ini_donors]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['donors' => 'required', 'title' => 'required|max:70', 'organization' => 'max:70', 'date_string' => 'max:100', 'video' => 'max:100', 'logo' => 'max:150', 'description' => 'max:400', 'content' => 'required', 'place' => 'required', 'who_category_id' => 'required|numeric','disc_sub_category'=>'required']);

        $initiative = Initiative::find($id);
        $initiativePrev = Initiative::find($id);
        if ($request->hasFile('logo')) {
            if ($initiative->logo != '0') {
                File::delete(public_path($initiative->logo));
            }
            $imgName = (string)time();
            $iniCategory = DB::table('what_categories')->where('id', 5)->get()->pluck('name')[0];
            $path = '/images/initiatives/' . $iniCategory . '/';
            $imgExt = $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path($path), $imgName . '.' . $imgExt);
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
        $initiative->sub_what_category_id	 = $request->input('disc_sub_category');

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
        $disc_sub_categories = SubWhatCategory::where('what_category_id', 5)->get();

        return view('new.admin.disc.create', ['disc_sub_categories' => $disc_sub_categories,'who_categories' => $who_categories, 'donors' => $donors, 'places' => $places]);

    }

    public function store(Request $request)
    {
        $request->validate(['donors' => 'required','disc_sub_category' =>'required', 'title' => 'required|max:70', 'organization' => 'max:70', 'date_string' => 'max:100', 'video' => 'max:100', 'logo' => 'max:150', 'description' => 'max:400', 'content' => 'required', 'who_category_id' => 'required|numeric', 'place' => 'required']);

        $initiative = new Initiative;
        if ($request->hasFile('logo')) {
            $imgName = (string)time();
            $iniCategory = DB::table('what_categories')->where('id', 5)->get()->pluck('name')[0];
            $path = '/images/initiatives/' . $iniCategory . '/' . $request->input('title') . '/';
            $imgExt = $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move(public_path($path), $imgName . '.' . $imgExt);
            $initiative->logo = $path . $imgName . '.' . $imgExt;
        }
        $initiative->video = $request->filled('video') ? $request->input('video') : '0';
        $initiative->what_category_id = 5;
        $initiative->who_category_id = $request->input('who_category_id');
        $initiative->sub_what_category_id	 = $request->input('disc_sub_category');
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
        File::delete(public_path($initiative->logo));
        $images = InitiativeImage::where('initiative_id', $id)->get();
        InitiativeImage::where('initiative_id', $id)->delete();
        foreach ($images as $image) {
            File::delete(public_path($image->path), substr(public_path($image->path), 0, -4) . 'b.jpg');
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
        return view('new.admin.disc.images.create', ['initiative' => $initiative, 'images' => $images]);
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
        $categoryName = 5;
        $images = new \MultipleIterator();
        $images->attachIterator(new \ArrayIterator($request->file('small_image')));
        $images->attachIterator(new \ArrayIterator($request->file('big_image')));
        foreach ($images as $i => $image) {
            $imgName = (string)time() . $i[0];
            $path = '/initiatives/' . $categoryName . '/' . $request->input('title') . '/';
            $image[0]->move(public_path($path), $imgName . '.jpg');
            $image[1]->move(public_path($path), $imgName . 'b.jpg');
            $initiativeImage = new InitiativeImage();
            $initiativeImage->initiative_id = $request->input('initiative_id');
            $initiativeImage->path = '/'.public_path($path) . $imgName . '.jpg';
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
                File::delete(public_path($img->path));
                File::delete(public_path(substr($img->path, 0, -4) . 'b.jpg'));
            }
        }
        $this->saveToLog(self::INITIATIVES, $id, $deletedImagesCount . ' Images deleted');
        return redirect('admin/disc/images/' . $id)->with('success', $deletedImagesCount . ' Images deleted');
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

    ////////////////// Success ///////////////////////
    public function success_index()
    {
        $sucdisc = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '5')->where('online', '1')->get();
        $sucpending = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '0')->get();

        return view('new.admin.disc.successes.index', ['sucstudy' => $sucdisc, 'sucpending' => $sucpending,


        ]);
    }

    public function success_create()
    {
        $microProjects = Project::with('english')->where('MPE_Done', '1')->where('MPE_Published', '1')->get();
        $what_categories = WhatCategory::all();
        $who_categories = WhoCategory::all();
        $disc_sub_categories = SubWhatCategory::where('what_category_id', 100)->get();
        $places = Place::all();
        $centers = StudyzoneCenter::all();

        return view('new.admin.disc.successes.create', ['microProjects' => $microProjects, 'what_categories' => $what_categories, 'who_categories' => $who_categories, 'disc_sub_categories' => $disc_sub_categories, 'places' => $places, 'centers' => $centers,]);
    }


    public function success_store(Request $request)
    {
        $request->validate(['who_category_id' => 'required|numeric', 'image_path' => 'required|max:70', 'title' => 'required|max:100', 'text' => 'required', 'place_id' => 'required']);

        $success = new Success();
        $imgName = (string)time();
        $whoCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
        $path = '/images/successes/' . $whoCategory . '/';
        $request->file('image_path')->move(public_path($path), $imgName . '.jpg');
        $success->image_path = $path . $imgName . '.jpg';

        $success->inner_image_path = '0';
        $success->inner_big_image_path = '0';

        $success->video = $request->filled('video') ? $request->input('video') : '0';
        $success->who_category_id = $request->input('who_category_id');
        $success->what_category_id = 5;


        $success->place_id = $request->input('place_id');
//        $success->sz_center_id = $request->input('center');


        $success->online = 0;
        $success->save();
        $englishSuccess = new SuccessEnglish();
        $englishSuccess->success_id = $success->id;
        $englishSuccess->title = $request->input('title');
        $englishSuccess->text = $request->input('text');
        $englishSuccess->save();
        $this->saveToLog(self::SUCCESSES, $success->id, 'Success Created');
        return redirect()->back()->with('success', 'Success ' . $success->id . ' has been created');
    }

    public function success_show($id)
    {
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $success = Success::with('english')->where('id', $id)->first();
        if (!isset($success)) {
            return view('new.errors.404');
        }
        return view('new.admin.disc.successes.view', ['success' => $success, 'language' => 'english']);
    }


    public function success_edit($id)
    {
        $success = Success::with('english')->where('id', $id)->first();
        $who_categories = WhoCategory::all();

        $places = Place::all();
//        $centers = StudyzoneCenter::all();

        return view('new.admin.disc.successes.edit', ['successData' => $success, 'who_categories' => $who_categories, 'places' => $places

        ]);
    }

    public function success_update(Request $request, $id)
    {
        $request->validate(['who_category_id' => 'required|numeric',
//            'image_path' => 'max:70',
            'title' => 'required|max:100', 'text' => 'required', //            'video' => 'max:100',
            'place_id' => 'required',
//            'center' => 'required'
        ]);

        $success = Success::find($id);
        $successPrev = Success::find($id);
//        if ($request->hasFile('image_path')) {
//            File::delete(public_path($success->image_path));
//            $imgName = (string)time();
//            $whoCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
//            $path = '/images/successes/' . $whoCategory . '/';
//            $request->file('image_path')->move(public_path($path), $imgName . '.jpg');
//            $success->image_path = $path . $imgName . '.jpg';
//            $this->saveToLog(self::SUCCESSES, $success->id, 'Image changed');
//        }

//        $success->video = $request->filled('video') ? $request->input('video') : '0';
//        if ($success->isDirty('video')) {
//            $this->saveToLogWithData(self::SUCCESSES, $id,'Video Edited', $successPrev->video, $success->video);
//        }
        $success->who_category_id = $request->input('who_category_id');
        if ($success->isDirty('who_category_id')) {
            $whoCategory = DB::table('who_categories')->where('id', $request->input('who_category_id'))->get()->pluck('name')[0];
            $whoCategoryPrev = DB::table('who_categories')->where('id', $successPrev->who_category_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Who we serve category changed', $whoCategoryPrev, $whoCategory);
        }
        $success->what_category_id = 5;

        $success->place_id = $request->input('place_id');
        if ($success->isDirty('place_id')) {
            $place = DB::table('places')->where('id', $request->input('place_id'))->get()->pluck('name')[0];
            $placePrev = DB::table('places')->where('id', $successPrev->place_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Place changed', $placePrev, $place);
        }

//        $success->sz_center_id = $request->input('center');

        $success->save();
        $englishSuccess = SuccessEnglish::find($id);
        $englishSuccessPrev = SuccessEnglish::find($id);
        $englishSuccess->title = $request->input('title');
        if ($englishSuccess->isDirty('title')) {
            $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Title edited', $englishSuccessPrev->title, $englishSuccess->title);
        }
        $englishSuccess->text = $request->input('text');
        if ($englishSuccess->isDirty('text')) {
            $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Text edited', $englishSuccessPrev->text, $englishSuccess->text);
        }

        $englishSuccess->save();
        return redirect()->back()->with('success', 'Success ' . $success->id . ' has been updated');
    }

    public function success_destroy($id)
    {
        $success = Success::find($id);
        Success::destroy($id);
        SuccessEnglish::where('success_id', $id)->delete();
        SuccessFrench::where('success_id', $id)->delete();
        File::delete(public_path($success->image_path));
        File::delete(public_path($success->inner_image_path));
        File::delete(public_path($success->inner_big_image_path));
        $this->saveToLog(self::SUCCESSES, $success->id, 'Success deleted');
        return redirect()->back()->with('success', 'Success deleted');
    }

    public function success_online(Request $request)
    {
        $success = Success::find($request->input('id'));
        $success->online = '1';
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'), 'Made online');
        return redirect()->route('home')->with('success', 'Success ' . $request->input('id') . ' is online');
    }

    public function success_offline(Request $request)
    {
        $success = Success::find($request->input('id'));
        $success->online = '0';
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'), 'Made offline');
        return redirect()->back()->with('success', 'Success ' . $request->input('id') . ' is offline');
    }

    public function success_Englishchecked(Request $request)
    {
        $success = Success::find($request->input('id'));
        $success->english_check = '1';
        $success->timestamps = false;
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'), 'English Checked');
        return redirect()->back()->with('success', 'Success ' . $request->input('id') . ' English Checked');
    }
}
