<?php

namespace App\Http\Controllers;

use App\User;
use App\Donor;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent;
use function Sodium\add;

class InitiativesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $iniCOI = Initiative::with('english')
            ->where('what_category_id','1')
            ->where('online', '1')
            ->get();
        $iniDevelopment = Initiative::with('english')
            ->where('what_category_id','2')
            ->where('online', '1')
            ->get();
        $iniRehabilitation = Initiative::with('english')
            ->where('what_category_id','3')
            ->where('online', '1')
            ->get();
        $iniEarth = Initiative::with('english')
            ->where('what_category_id','18')
            ->where('online', '1')
            ->get();
        $iniRelief = Initiative::with('english')
            ->where('what_category_id','4')
            ->where('online', '1')
            ->get();
        $iniDISC = Initiative::with('english','place')
            ->where('what_category_id','5')
            ->where('online', '1')
            ->get();

        $iniStudy = Initiative::with('english','subWhatCategory','place','center')
            ->where('what_category_id','7')
            ->where('online', '1')
            ->get();

        $iniChildrenUni = Initiative::with('english','place')
            ->where('what_category_id','17')
            ->where('online', '1')
            ->get();

        $iniSchool = Initiative::with('english')
            ->where('what_category_id','9')
            ->where('online', '1')
            ->get();
        $iniFamilyDist = Initiative::with('english')
            ->where('what_category_id','8')
            ->where('sub_what_category_id', '1')
            ->where('online', '1')
            ->get();
        $iniFamilyStories = Initiative::with('english')
            ->where('what_category_id','8')
            ->where('sub_what_category_id', '2')
            ->where('online', '1')
            ->get();

        $iniPending = Initiative::with('english','whatCategory','subWhatCategory','place','center','images')
            ->pending()
            ->whereIn('what_category_id',[1,3,4,8,18])
            ->get();

        $iniHidden = Initiative::with('english','whatCategory','subWhatCategory','place','center','images')
            ->hiddenOnly()
            ->whereIn('what_category_id',[1,3,4,8,18])
            ->get();

        return view('new.admin.initiatives.index', [
            'iniCOI' => $iniCOI,
            'iniDevelopment' => $iniDevelopment,
            'iniRehabilitation' => $iniRehabilitation,
            'iniEarth' => $iniEarth,
            'iniRelief' => $iniRelief,
            'iniDISC' => $iniDISC,
            'iniStudy' => $iniStudy,
            'iniChildrenUni' => $iniChildrenUni,
            'iniSchool' => $iniSchool,
            'iniFamilyDist' => $iniFamilyDist,
            'iniFamilyStories' => $iniFamilyStories,
            'iniPending' => $iniPending,
            'iniHidden' => $iniHidden,
        ]);
    }

    public function create()
    {
        $what_categories = WhatCategory::whereIn('id', [1,3,4,8,18])->get();
        $who_categories = WhoCategory::all();
        $family_sub_categories = SubWhatCategory::where('what_category_id', 8)->get();
        $f2f_partners = Initiative::with('english')->where('sub_what_category_id', 1)->get();
        $donors = Donor::all();
        $places = Place::all();
        $centers = StudyzoneCenter::all();

        return view('new.admin.initiatives.create',[
            'what_categories' => $what_categories,
            'who_categories' => $who_categories,
            'donors' => $donors,
            'family_sub_categories' => $family_sub_categories,
            'f2f_partners' => $f2f_partners,
            'places' => $places,
            'centers' => $centers,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'what_category_id' => 'required|numeric',
            'donors' => 'required',
            'title' => 'required|max:70',
            'organization' => 'max:70',
            'date_string' => 'max:100',
            'video' => 'max:100',
            'logo' => 'max:150',
            'description' => 'max:400',
            'content' => 'required',
            'who_category_id' => 'required|numeric',
        ]);

        $initiative = new Initiative;
        if ($request->hasFile('logo')) {
            $imgName = (string)time();
            $iniCategory = DB::table('what_categories')->where('id',$request->input('what_category_id'))->get()->pluck('name')[0];
            $path = '/images/initiatives/'.$iniCategory.'/'.$request->input('title').'/';
            $imgExt = $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($path,$imgName.'.'.$imgExt);
            $initiative->logo = $path.$imgName.'.'.$imgExt;
        }
        $initiative->video = $request->filled('video') ? $request->input('video') : '0';
        $initiative->what_category_id = $request->input('what_category_id');
        $initiative->who_category_id = $request->input('who_category_id');

        if ($request->input('what_category_id') == '8' ) $initiative->sub_what_category_id =1;
        $initiative->save();
        $engInitiative = new InitiativeEnglish;
        $engInitiative->initiative_id = $initiative->id;
        $engInitiative->title = $request->input('title');
        $engInitiative->organization = $request->filled('organization') ? $request->input('organization') : '0';
        $engInitiative->date_string = $request->filled('date_string') ? $request->input('date_string') : '0';
        $engInitiative->description = $request->filled('description') ? $request->input('description') : '0';
        $engInitiative->content = $request->input('content');
        $engInitiative->save();
        $initiative->donors()->attach(array_map('intval',$request->input('donors')));
        $this->saveToLog(self::INITIATIVES, $initiative->id,'Initiative Created');
        return redirect()->route('initiatives.index')->with('success', 'Initiative '.$initiative->id.' has been created');
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
        $imagesRehabilitation = InitiativeImageRehabilitation::where('initiative_id',$id)->get();
        $testimonies = Testimony::with('english', 'french')
            ->where('initiative_id', $id)
            ->get();
        return view('new.admin.initiatives.view', [
            'initiative' => $initiative,
            'images' => $images,
            'imagesRehabilitation' => $imagesRehabilitation,
            'testimonies' => $testimonies,
        ]);
    }

    public function edit($id)
    {
        $what_categories = WhatCategory::all();
        $who_categories = WhoCategory::all();
        $disc_sub_categories = SubWhatCategory::where('what_category_id', 5)->get();
        $study_sub_categories = SubWhatCategory::where('what_category_id', 7)->get();
        $family_sub_categories = SubWhatCategory::where('what_category_id', 8)->get();
        $school_sub_categories = SubWhatCategory::where('what_category_id', 9)->get();
        $donors = Donor::all();
        $places = Place::all();
        $centers = StudyzoneCenter::all();
        $ini_donors = [];


        $f2f_partners = Initiative::with('english')->where('sub_what_category_id', 1)->get();
        $initiative = Initiative::with('english', 'donors')->where('id', $id)->first();

        foreach ($initiative['donors'] as $i) {
            array_push($ini_donors, $i->id);
        }

        return view('new.admin.initiatives.edit', [
            'initiative' => $initiative,
            'what_categories' => $what_categories,
            'who_categories' => $who_categories,
            'donors' => $donors,
            'ini_donors' => $ini_donors,
            'centers' => $centers,

            'disc_sub_categories' => $disc_sub_categories,
            'study_sub_categories' => $study_sub_categories,
            'family_sub_categories' => $family_sub_categories,
            'school_sub_categories' => $school_sub_categories,
            'f2f_partners' => $f2f_partners,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'donors' => 'required',
            'title' => 'required|max:70',
            'organization' => 'max:70',
            'date_string' => 'max:100',
            'video' => 'max:100',
            'logo' => 'max:150',
            'description' => 'max:400',
            'content' => 'required',
            'who_category_id' => 'required|numeric',
        ]);



        if ($request->input('what_category_id') == '8' ) {
            $request->validate([ 'family_sub_category' => 'required' ]);
            if ($request->input('family_sub_category') == '2' ) {
                $request->validate([ 'f2f_partner' => 'required' ]);
            }
        }

        $initiative = Initiative::find($id);
        $initiativePrev = Initiative::find($id);
        if ($request->hasFile('logo')) {
            if ($initiative->logo != '0') {
                File::delete($initiative->logo);
            }
            $imgName = (string)time();
            $iniCategory = DB::select('select what_categories.name from what_categories where what_categories.id = (SELECT what_category_id from initiatives where initiatives.id = '.$id.')');
            $iniCategory = $iniCategory[0]->name;
//            return ($iniCategory);
//            $iniCategory = DB::table('what_categories')->where('id',$request->input('what_category_id'))->get()->pluck('name')[0];
            $path = '/images/initiatives/'.$iniCategory.'/';
            $imgExt = $request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->move($path,$imgName.'.'.$imgExt);
            $initiative->logo = $path.$imgName.'.'.$imgExt;
            $this->saveToLog(self::INITIATIVES, $id,'Logo changed');
        }
        $initiative->video = $request->filled('video') ? $request->input('video') : '0';
        if ($initiative->isDirty('video')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'Video Edited', $initiativePrev->video, $initiative->video);
        }
        if ($initiative->isDirty('donor_id')) {
            $previousDonor = Donor::find($initiativePrev->donor_id)->name;
            $newDonor = Donor::find($request->input('donor'))->name;
            $this->saveToLogWithData(self::INITIATIVES, $id,'Donor Edited', $previousDonor, $newDonor);
        }

        $initiative->who_category_id = $request->input('who_category_id');
        if ($initiative->isDirty('who_category_id')) {
            $iniCategory = DB::table('who_categories')->where('id',$request->input('who_category_id'))->get()->pluck('name')[0];
            $iniCategoryPrev = DB::table('who_categories')->where('id',$initiativePrev->who_category_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::INITIATIVES, $id,'Serve category changed', $iniCategoryPrev, $iniCategory);
        }


        if ($request->input('what_category_id') == '8' ) $initiative->sub_what_category_id = $request->input('family_sub_category');


//        if ($request->input('family_sub_category') == '2' ) $initiative->partner_id = $request->input('f2f_partner');
//        if ($initiative->isDirty('partner_id') && $initiative->partner_id != '0') {
//            $iniPartner = Initiative::with('english')->where('id',$initiative->partner_id)->get()[0]['english']['title'];
//            if ($initiativePrev->partner_id != '0') {
//                $iniPartnerPrev = Initiative::with('english')->where('id',$initiativePrev->partner_id)->get()[0]['english']['title'];
//            }else {
//                $iniPartnerPrev = 'N/A';
//            }
//            $this->saveToLogWithData(self::INITIATIVES, $id,'partner changed', $iniPartnerPrev, $iniPartner);
//        }

        $initiative->save();
        $engInitiative = InitiativeEnglish::where('initiative_id', $id)->first();
        $engInitiativePrev = InitiativeEnglish::where('initiative_id', $id)->first();
        $engInitiative->title = $request->input('title');
        if ($engInitiative->isDirty('title')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'Title edited', $engInitiativePrev->title, $engInitiative->title);
        }
        $engInitiative->organization = $request->filled('organization') ? $request->input('organization') : '0';
        if ($engInitiative->isDirty('organization')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'Organization edited', $engInitiativePrev->organization, $engInitiative->organization);
        }
        $engInitiative->date_string = $request->filled('date_string') ? $request->input('date_string') : '0';
        if ($engInitiative->isDirty('date_string')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'date edited', $engInitiativePrev->date_string, $engInitiative->date_string);
        }
        $engInitiative->description = $request->filled('description') ? $request->input('description') : '0';
        if ($engInitiative->isDirty('description')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'description edited', $engInitiativePrev->description, $engInitiative->description);
        }
        $engInitiative->content = $request->input('content');
        if ($engInitiative->isDirty('content')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'Content edited', $engInitiativePrev->content, $engInitiative->content);
        }
        $engInitiative->save();
        $donorsSync = $initiative->donors()->sync(array_map('intval',$request->input('donors')));
        foreach ($donorsSync['attached'] as $donor_id) {
            $this->saveToLog(self::INITIATIVES, $id, 'Donor '.Donor::find($donor_id)->name.' attached');
        }
        foreach ($donorsSync['detached'] as $donor_id) {
            $this->saveToLog(self::INITIATIVES, $id, 'Donor '.Donor::find($donor_id)->name.' detached');
        }
//        if($initiative->published == '1')
// {
            return redirect('admin\home')->with('success', 'Initiative '.$initiative->id.' has been updated');
//        }
//        else {
//            return redirect('admin/home')->with('success', 'Initiative '.$initiative->id.' has been updated');
//        }
    }

    public function destroy($id)
    {
        $initiative = Initiative::find($id);
        Initiative::destroy($id);
        InitiativeEnglish::where('initiative_id', $id)->delete();
        InitiativeFrench::where('initiative_id', $id)->delete();
        File::delete($initiative->logo);
        $images = InitiativeImage::where('initiative_id', $id)->get();
        InitiativeImage::where('initiative_id', $id)->delete();
        foreach ($images as $image) {
            File::delete($image->path,substr($image->path, 0, -4).'b.jpg');
        }
        $this->saveToLog(self::INITIATIVES, $id, 'Initiative deleted');
        return redirect()->back()->with('success', 'Initiative '.$id.' deleted successfully');
    }

    public function online(Request $request)
    {
        $initiative = Initiative::find($request->input('id'));
        $initiative->online = '1';
        $initiative->hidden = 0;    // publishing always clears the hidden flag
        $initiative->save();
        return redirect('admin/home')->with('success', 'Initiative '.$request->input('id').' is online');
    }

    public function offline(Request $request)
    {
        $initiative = Initiative::find($request->input('id'));
        $initiative->online = '0';
        $initiative->save();
        return redirect()->back()->with('success', 'Initiative '.$request->input('id').' is offline');
    }

    /**
     * Park an initiative: offline, and out of the "pending to publish" lists.
     * Works from any state, so hiding a published initiative also takes it down.
     */
    public function hide(Request $request)
    {
        $initiative = Initiative::find($request->input('id'));

        if (! $initiative) {
            $message = 'That initiative no longer exists.';

            return $request->expectsJson()
                ? response()->json(['ok' => false, 'message' => $message], 404)
                : redirect()->back()->with('error', $message);
        }

        $initiative->online = '0';
        $initiative->hidden = 1;
        $initiative->save();

        $this->saveToLog(self::INITIATIVES, $initiative->id, 'Initiative Status: Hidden');

        $message = 'Initiative #'.$initiative->id.' is now hidden.';

        return $request->expectsJson()
            ? response()->json(['ok' => true, 'message' => $message])
            : redirect()->back()->with('success', $message);
    }

    /**
     * Return an initiative to the "pending to publish" queue. It stays offline.
     */
    public function unhide(Request $request)
    {
        $initiative = Initiative::find($request->input('id'));

        if (! $initiative) {
            $message = 'That initiative no longer exists.';

            return $request->expectsJson()
                ? response()->json(['ok' => false, 'message' => $message], 404)
                : redirect()->back()->with('error', $message);
        }

        $initiative->hidden = 0;
        $initiative->save();

        $this->saveToLog(self::INITIATIVES, $initiative->id, 'Initiative Status: Pending to publish');

        $message = 'Initiative #'.$initiative->id.' moved back to Pending.';

        return $request->expectsJson()
            ? response()->json(['ok' => true, 'message' => $message])
            : redirect()->back()->with('success', $message);
    }

    public function Englishchecked(Request $request){
        $initiative = Initiative::find($request->input('id'));
        $initiative->english_check = '1';
        $initiative->timestamps = false;
        $initiative->save();
        $this->saveToLog(self::INITIATIVES, $initiative->id,'Initiative English Checked');
        return redirect()->back()->with('success', 'Initiative '.$request->input('id').' English Checked');
    }
}
