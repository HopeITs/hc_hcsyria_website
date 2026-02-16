<?php

namespace App\Http\Controllers;

use App\Initiative;
use App\InitiativeEnglish;
use App\InitiativeFrench;
use App\InitiativeImage;
use App\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InitiativesFrenchController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','french']);
    }

    public function create($id)
    {
        $initiative = Initiative::with('english','whatCategory')->where('id', $id)->first();
        return view('new.admin.initiatives.french.create')->with('initiative', $initiative);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'title' => 'required',
            'content' => 'required',
            'organization' => 'max:70',
            'date_string' => 'max:100',
            'description' => 'max:500',
        ]);
        $frenchInitiative = new InitiativeFrench();
        $frenchInitiative->initiative_id = $request->input('id');
        $frenchInitiative->title = $request->input('title');
        $frenchInitiative->organization = $request->filled('organization') ? $request->input('organization') : '0';
        $frenchInitiative->date_string = $request->filled('date_string') ? $request->input('date_string') : '0';
        $frenchInitiative->description = $request->filled('description') ? $request->input('description') : '0';
        $frenchInitiative->content = $request->input('content');
        $frenchInitiative->translation_paid = '0';
        $frenchInitiative->save();
        DB::table('initiatives')->where('id',$request->input('id'))->update(['french_translation' => '1']);
        $this->saveToLog(self::INITIATIVES, $request->input('id'),'Translated');
        return redirect('admin/projects/french-index')->with('success','Initiative '.$request->input('id').' has been added to translated initiatives');

    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('errors.404');
        }
        $initiative = Initiative::with('french')->where('id', $id)->first();
        if (!isset($initiative)) {
            return view('errors.404');
        }
        $images = InitiativeImage::where('initiative_id',$id)->get();
        $testimonies = Testimony::with('english', 'french')
            ->where('initiative_id', $id)
            ->where('french_translation', '1')
            ->get();
        return view('new.admin.initiatives.french.view', ['initiative' => $initiative,
            'images' => $images,
            'testimonies' => $testimonies,
        ]);
    }

    public function edit($id)
    {
        $initiative = Initiative::with('english', 'french', 'whatCategory')->where('id' ,$id)->first();
        if (is_null($initiative)){
            return 'initiative doesn\'t exist';
        } elseif (is_null($initiative->french)){
            return 'initiative '.$id.' is not translated';
        }
        return view('new.admin.initiatives.french.edit', ['initiative' => $initiative]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'organization' => 'max:70',
            'date_string' => 'max:100',
            'description' => 'max:500',
        ]);
        $initiativeEng = InitiativeEnglish::where('initiative_id',$id)->first();
        if ($initiativeEng->organization != '0') {
            $request->validate(['organization' => 'required']);
        }
        if ($initiativeEng->date_string != '0') {
            $request->validate(['date_string' => 'required']);
        }
        if ($initiativeEng->description != '0') {
            $request->validate(['description' => 'required']);
        }
        $frenchInitiative = InitiativeFrench::where('initiative_id', $id)->first();
        $frenchInitiativePrev = InitiativeFrench::where('initiative_id', $id)->first();
        $frenchInitiative->title = $request->input('title');
        if ($frenchInitiative->isDirty('title')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'French title edited', $frenchInitiativePrev->title, $frenchInitiative->title);
        }
        $frenchInitiative->organization = $request->filled('organization') ? $request->input('organization') : '0';
        if ($frenchInitiative->isDirty('organization')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'French organization edited', $frenchInitiativePrev->organization, $frenchInitiative->organization);
        }
        $frenchInitiative->date_string = $request->filled('date_string') ? $request->input('date_string') : '0';
        if ($frenchInitiative->isDirty('date_string')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'French date edited', $frenchInitiativePrev->date_string, $frenchInitiative->date_string);
        }
        $frenchInitiative->description = $request->filled('description') ? $request->input('description') : '0';
        if ($frenchInitiative->isDirty('description')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'French description edited', $frenchInitiativePrev->description, $frenchInitiative->description);
        }
        $frenchInitiative->content = $request->input('content');
        if ($frenchInitiative->isDirty('content')) {
            $this->saveToLogWithData(self::INITIATIVES, $id,'French content edited', $frenchInitiativePrev->content, $frenchInitiative->content);
        }
        $frenchInitiative->save();
        return redirect('admin/projects/french-index')->with('success', 'Initiative '.$initiativeEng->initiative_id.' has been updated');
    }

    public function paid($id){
        $initiative = InitiativeFrench::where('initiative_id' ,$id)->first();
        $initiative->translation_paid = '1';
        $initiative->save();
        $this->saveToLog(self::INITIATIVES, $id, 'Translation Paid');
    }
}
