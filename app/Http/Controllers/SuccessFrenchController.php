<?php

namespace App\Http\Controllers;

use App\Success;
use App\SuccessFrench;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuccessFrenchController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','french']);
    }

    public function create($id)
    {
        $successData = Success::with('english')->where('id', $id)->first();
        return view('admin.successes.french.create')->with('successData', $successData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'title' => 'required',
            'text' => 'required',
        ]);
        $frenchSuccess = new SuccessFrench();
        $frenchSuccess->success_id = $request->input('id');
        $frenchSuccess->title = $request->input('title');
        $frenchSuccess->text = $request->input('text');
        $frenchSuccess->translation_paid = '0';
        $frenchSuccess->save();
        DB::table('successes')->where('id',$request->input('id'))->update(['french_translation' => '1']);
        $this->saveToLog(self::SUCCESSES, $request->input('id'),'Translated');
        return redirect()->route('projects_french_index')->with('success','Success has been added to translated successes');
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('errors.404');
        }
        $success = Success::with('french')->where('id', $id)->first();
        if (!isset($success)) {
            return view('errors.404');
        }
        return view('admin.successes.view', ['success' => $success, 'language' => 'french']);
    }

    public function edit($id)
    {
        $success = Success::with('english', 'french')->where('id',$id)->first();
        return view('admin.successes.french.edit', ['successData' => $success]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);
        $frenchSuccess = SuccessFrench::where('success_id',$id)->first();
        $frenchSuccessPrev = SuccessFrench::where('success_id',$id)->first();
        $frenchSuccess->title = $request->input('title');
        if ($frenchSuccess->isDirty('title')) {
            $this->saveToLogWithData(self::SUCCESSES, $id, 'Title edited (French)', $frenchSuccessPrev->title, $frenchSuccess->title);
        }
        $frenchSuccess->text = $request->input('text');
        if ($frenchSuccess->isDirty('text')) {
            $this->saveToLogWithData(self::SUCCESSES, $id, 'Text edited (French)', $frenchSuccessPrev->text, $frenchSuccess->text);
        }
        $frenchSuccess->save();
        return redirect()->route('projects_french_index')->with('success', 'Success '.$id.' has been updated');
    }

    public function paid($id){
        $success = SuccessFrench::where('success_id' ,$id)->first();
        $success->translation_paid = '1';
        $success->save();
        $this->saveToLog(self::SUCCESSES, $id, 'Translation Paid');
    }
}
