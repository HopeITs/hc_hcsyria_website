<?php

namespace App\Http\Controllers;

use App\Initiative;
use App\InitiativeFrench;
use App\InitiativeImage;
use App\Testimony;
use App\TestimonyFrench;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimoniesFrenchController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','french']);
    }

    public function create($id)
    {
        $testimony = Testimony::with('english','initiativeEnglish')->where('id', $id)->first();
        return view('admin.initiatives.french.create-testimony')->with('testimony', $testimony);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|unique:testimonies_french',
            'name' => 'required|max:70',
            'text' => 'required',
        ]);
        $frenchTestimony = new TestimonyFrench();
        $frenchTestimony->testimony_id = $request->input('id');
        $frenchTestimony->name = $request->input('name');
        $frenchTestimony->text = $request->input('text');
        $frenchTestimony->translation_paid = '0';
        $frenchTestimony->timestamps = false;
        $frenchTestimony->save();
        DB::table('testimonies')->where('id',$request->input('id'))->update(['french_translation' => '1']);
        $initiative_id = DB::table('testimonies')->where('id',$request->input('id'))->pluck('initiative_id')[0];
        $this->saveToLog(self::INITIATIVES, $initiative_id,'Testimony Translated');
        return redirect()->route('projects_french_index')->with('success','Testimony has been added to translated testimonies');

    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('errors.404');
        }
        $testimony = Testimony::with('french')->where('id', $id)->first();
        if (!isset($testimony)) {
            return view('errors.404');
        }
        return view('admin.initiatives.french.testimony-view', ['testimony' => $testimony, 'language' => 'french']);
    }

    public function edit($id)
    {
        $testimony = Testimony::with('english', 'french', 'initiativeEnglish')->where('id' ,$id)->first();
        if (is_null($testimony)){
            return 'testimony doesn\'t exist';
        } elseif (is_null($testimony->french)){
            return 'testimony '.$id.' is not translated';
        }
        return view('admin.initiatives.french.edit-testimony', ['testimony' => $testimony]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:70',
            'text' => 'required',
        ]);
        $initiative_id = Testimony::find($id)['initiative_id'];
        $frenchTestimony = TestimonyFrench::where('testimony_id', $id)->first();
        $frenchTestimonyPrev = TestimonyFrench::where('testimony_id', $id)->first();
        $frenchTestimony->name = $request->input('name');
        if ($frenchTestimony->isDirty('name')) {
            $this->saveToLogWithData(self::INITIATIVES, $initiative_id,'French testimony name edited', $frenchTestimonyPrev->name, $frenchTestimony->name);
        }
        $frenchTestimony->save();
        return redirect('admin/projects/french-index')->with('success', 'Testimony has been updated');
    }

    public function paid($id){
        $testimonyFr = TestimonyFrench::with('testimony')->where('id' ,$id)->first();
        $testimonyFr->translation_paid = '1';
        $testimonyFr->timestamps = false;
        $testimonyFr->save();
        $this->saveToLog(self::INITIATIVES, $testimonyFr->testimony->initiative_id, 'Testimony Translation Paid');
    }
}
