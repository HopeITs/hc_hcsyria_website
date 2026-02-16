<?php

namespace App\Http\Controllers;

use App\Project;
use App\Success;
use App\SuccessEnglish;
use App\SuccessFrench;
use App\WhatCategory;
use App\WhoCategory;
use App\SubWhatCategory;
use App\Place;
use App\StudyzoneCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class SuccessController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
//        $men = Success::with('english'      ,'place')->where('who_category_id', '1')->where('online', '1')->get();
//        $women = Success::with('english'    ,'place')->where('who_category_id', '2')->where('online', '1')->get();
//        $youth = Success::with('english'    ,'place','center','subWhatCategory')->where('who_category_id', '3')->where('online', '1')->get();
//        $children = Success::with('english' ,'place')->where('who_category_id', '4')->where('online', '1')->get();
//        $elders = Success::with('english'   ,'place')->where('who_category_id', '5')->where('online', '1')->get();

        $sucdisc = Success::with('english','whatCategory','subWhatCategory','place','center' )
            ->where('what_category_id', '5')
            ->where('online', '1')
            ->get();
        $sucstudy = Success::with('english','whatCategory','subWhatCategory','place','center' )
            ->where('what_category_id', '7')
            ->where('online', '1')
            ->get();
        $succhildren = Success::with('english','whatCategory','subWhatCategory','place','center')
            ->where('what_category_id', '17')
            ->where('online', '1')
            ->get();
        $sucpending = Success::with('english','whatCategory','subWhatCategory','place','center')
            ->where('online', '0')
            ->get();

        return view('new.admin.successes.index', [
           'sucdisc' => $sucdisc,
           'sucstudy' => $sucstudy,
           'succhildren' => $succhildren,
           'sucpending' => $sucpending,


        ]);
    }

    public function create()
    {
        $microProjects = Project::with('english')
            ->where('MPE_Done', '1')
            ->where('MPE_Published', '1')
            ->get();
        $what_categories = WhatCategory::all();
        $who_categories = WhoCategory::all();
        $disc_sub_categories = SubWhatCategory::where('what_category_id', 100)->get();
        $places = Place::all();
        $centers = StudyzoneCenter::all();

        return view('new.admin.successes.create', [
            'microProjects' => $microProjects,
            'what_categories' => $what_categories,
            'who_categories' => $who_categories,
            'disc_sub_categories' => $disc_sub_categories,
            'places' => $places,
            'centers' => $centers,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'who_category_id' => 'required|numeric',
            'what_category_id' => 'required|numeric',
            'image_path' => 'required|max:70',
            'title' => 'required|max:100',
            'text' => 'required',
            'video' => 'max:100',
        ]);
        if ($request->input('what_category_id') == '10') {
            $request->validate(['project_id' => 'required']);
        }
        if ($request->input('what_category_id') == '5') //DISC
        {
            $request->validate(['disc_sub_category_id' => 'required']);
        }
        if ($request->input('what_category_id') == '7') //study
        {
            $request->validate([ 'place_id' => 'required' ]);
            $request->validate([ 'center' => 'required' ]);
        }
        $success = new Success();
        $imgName = (string)time();
        $whoCategory = DB::table('who_categories')->where('id',$request->input('who_category_id'))->get()->pluck('name')[0];
        $path = '/images/successes/'.$whoCategory.'/';
        $request->file('image_path')->move(public_path($path),$imgName.'.jpg');
        $success->image_path = $path.$imgName.'.jpg';

        $success->inner_image_path = '0';
        $success->inner_big_image_path = '0';

        $success->video = $request->filled('video') ? $request->input('video') : '0';
        $success->who_category_id = $request->input('who_category_id');
        $success->what_category_id = $request->input('what_category_id');

        $success->sub_what_category_id = $request->filled('disc_sub_category_id') ? $request->input('disc_sub_category_id') : '0';

        $success->place_id = $request->input('place_id');
        if ($request->input('what_category_id') == '7' ) {
            $success->sz_center_id = $request->input('center');
        }

        $success->project_id = $request->filled('project_id') ? $request->input('project_id') : '0';
        $success->french_translation = 0;
        $success->online = 0;
        $success->save();
        $englishSuccess = new SuccessEnglish();
        $englishSuccess->success_id = $success->id;
        $englishSuccess->title = $request->input('title');
        $englishSuccess->text = $request->input('text');
        $englishSuccess->save();
        $this->saveToLog(self::SUCCESSES, $success->id,'Success Created');
        return redirect()->back()->with('success', 'Success '.$success->id.' has been created');
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('errors.404');
        }
        $success = Success::with('english')->where('id', $id)->first();
        if (!isset($success)) {
            return view('errors.404');
        }
        return view('new.admin.successes.view', ['success' => $success, 'language' => 'english']);
    }


    public function edit($id)
    {
        $success = Success::with('english')->where('id',$id)->first();
        $microProjects = Project::with('english')
            ->where('MPE_Done', '1')
            ->where('MPE_Published', '1')
            ->get();
        $what_categories = WhatCategory::all();
        $who_categories = WhoCategory::all();
        $disc_sub_categories = SubWhatCategory::where('what_category_id', 100)->get();

        $places = Place::all();
        $centers = StudyzoneCenter::all();

        return view('new.admin.successes.edit', [
            'successData' => $success,
            'microProjects' => $microProjects,
            'what_categories' => $what_categories,
            'who_categories' => $who_categories,
            'disc_sub_categories' => $disc_sub_categories,
            'places' => $places,
            'centers' => $centers,

        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'who_category_id' => 'required|numeric',
            'what_category_id' => 'required|numeric',
            'image_path' => 'max:70',

            'title' => 'required|max:100',
            'text' => 'required',
            'video' => 'max:100',
        ]);
        if ($request->input('what_category_id') == '10') {
            $request->validate(['project_id' => 'required']);
        }
        if ($request->input('what_category_id') == '5') //DISC
        {
            $request->validate(['disc_sub_category_id' => 'required']);
        }
        if ($request->input('what_category_id') == '7' ) //study
        {
            $request->validate(['place_id' => 'required']);
            $request->validate(['center' => 'required']);
        }

        $success = Success::find($id);
        $successPrev = Success::find($id);
        if ($request->hasFile('image_path')) {
            File::delete(public_path($success->image_path));
            $imgName = (string)time();
            $whoCategory = DB::table('who_categories')->where('id',$request->input('who_category_id'))->get()->pluck('name')[0];
            $path = '/images/successes/'.$whoCategory.'/';
            $request->file('image_path')->move(public_path($path),$imgName.'.jpg');
            $success->image_path = $path.$imgName.'.jpg';
            $this->saveToLog(self::SUCCESSES, $success->id,'Image changed');
        }

        $success->video = $request->filled('video') ? $request->input('video') : '0';
        if ($success->isDirty('video')) {
            $this->saveToLogWithData(self::SUCCESSES, $id,'Video Edited', $successPrev->video, $success->video);
        }
        $success->who_category_id = $request->input('who_category_id');
        if ($success->isDirty('who_category_id')) {
            $whoCategory = DB::table('who_categories')->where('id',$request->input('who_category_id'))->get()->pluck('name')[0];
            $whoCategoryPrev = DB::table('who_categories')->where('id', $successPrev->who_category_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::SUCCESSES, $success->id,'Who we serve category changed', $whoCategoryPrev, $whoCategory);
        }
        $success->what_category_id = $request->input('what_category_id');
        if ($success->isDirty('what_category_id')) {
            $whatCategory = DB::table('what_categories')->where('id',$request->input('what_category_id'))->get()->pluck('name')[0];
            $whatCategoryPrev = DB::table('what_categories')->where('id', $successPrev->what_category_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::SUCCESSES, $success->id,'What we do category changed', $whatCategoryPrev, $whatCategory);
        }

        $success->place_id = $request->input('place_id');
        if ($success->isDirty('place_id')) {
            $place = DB::table('places')->where('id',$request->input('place_id'))->get()->pluck('name')[0];
            $placePrev = DB::table('places')->where('id', $successPrev->place_id)->get()->pluck('name')[0];
            $this->saveToLogWithData(self::SUCCESSES, $success->id,'Place changed', $placePrev, $place);
        }

        if ($request->input('what_category_id') == '7' ) {
            $success->sz_center_id = $request->input('center');
        }

        $success->sub_what_category_id = $request->filled('disc_sub_category_id') ? $request->input('disc_sub_category_id') : '0';


        if ($request->input('what_category_id') == '10') {
            $success->project_id = $request->input('project_id');
            if ($success->isDirty('project_id')) {
                $microName = Project::where('MicroProject_ID', $request->input('project_id'))->first()['MIE_BeneficiaryName'];
                $microNamePrev = Project::where('MicroProject_ID', $successPrev->project_id)->first()['MIE_BeneficiaryName'];
                $this->saveToLogWithData(self::SUCCESSES, $success->id, 'Link to micro project changed', $microNamePrev, $microName);
            }
        }
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
        return redirect('admin\home')->with('success', 'Success '.$success->id.' has been updated');
    }

    public function destroy($id)
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

    public function online(Request $request)
    {
        $success = Success::find($request->input('id'));
        $success->online = '1';
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'),'Made online');
        return redirect()->route('home')->with('success', 'Success '.$request->input('id').' is online');
    }

    public function offline(Request $request)
    {
        $success = Success::find($request->input('id'));
        $success->online = '0';
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'),'Made offline');
        return redirect()->back()->with('success', 'Success '.$request->input('id').' is offline');
    }

    public function Englishchecked(Request $request){
        $success = Success::find($request->input('id'));
        $success->english_check = '1';
        $success->timestamps = false;
        $success->save();
        $this->saveToLog(self::SUCCESSES, $request->input('id'),'English Checked');
        return redirect()->back()->with('success', 'Success '.$request->input('id').' English Checked');
    }
}
