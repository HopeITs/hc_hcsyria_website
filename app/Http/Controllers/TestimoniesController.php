<?php

namespace App\Http\Controllers;

use App\Initiative;
use App\Testimony;
use App\TestimonyEnglish;
use App\TestimonyFrench;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class TestimoniesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','english']);
    }

    public function index($id)
    {
        $initiative = Initiative::where('id', $id)->first();
        $testimonies = Testimony::with('english')->where('initiative_id', $id)->get();
        return view('admin.initiatives.testimonies', ['initiative' => $initiative,
            'testimonies' => $testimonies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'initiative_id' => 'required|numeric',
            'what_category_id' => 'required|integer|in:5,6',
            'image_path' => 'required|max:80',
            'name' => 'required|max:70',
            'text' => 'required',
        ]);
        $testimony = new Testimony();
        $imgName = (string)time();
        $iniCategory = DB::table('what_categories')->where('id',$request->input('what_category_id'))->get()->pluck('name')[0];
        $iniTitle = DB::table('initiatives_english')->where('initiative_id',$request->input('initiative_id'))->get()->pluck('title')[0];
        $path = '/images/initiatives/'.$iniCategory.'/'.$iniTitle.'/';
        $request->file('image_path')->move(public_path($path),$imgName.'.jpg');
        $testimony->image_path = $path.$imgName.'.jpg';
        $testimony->french_translation = '0';
        $testimony->initiative_id = $request->input('initiative_id');
        $testimony->save();
        $engTestimony = new TestimonyEnglish();
        $engTestimony->testimony_id = $testimony->id;
        $engTestimony->name = $request->input('name');
        $engTestimony->text = $request->input('text');
        $engTestimony->timestamps = false;
        $engTestimony->save();
        $this->saveToLog(self::INITIATIVES, $request->input('initiative_id'),'Testimony Created');
        return redirect()->route('initiatives.testimonies.index', [$request->input('initiative_id')])->with('success', 'Testimony has been added');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'initiative_id' => 'required|numeric',
            'what_category_id' => 'required|integer|in:5,6,7',
            'image_path' => 'max:80',
            'name' => 'required|max:70',
            'text' => 'required',
        ]);
        $testimony = Testimony::find($id);
        if ($request->hasFile('image_path')) {
            File::delete(public_path($testimony->image_path));
            $imgName = (string)time();
            $iniCategory = DB::table('what_categories')->where('id', $id)->get()->pluck('name')[0];
            $iniTitle = DB::table('initiatives_english')->where('initiative_id', $id)->get()->pluck('title')[0];
            $path = '/images/initiatives/'.$iniCategory.'/'.$iniTitle.'/';
            $request->file('image_path')->move(public_path($path),$imgName.'.jpg');
            $testimony->image_path = $path.$imgName.'.jpg';
            $this->saveToLog(self::INITIATIVES, $testimony->initiative_id,'Testimony image changed');
        }
        $testimony->save();
        $engTestimony = TestimonyEnglish::where('testimony_id', $id)->first();
        $engTestimonyPrev = TestimonyEnglish::where('testimony_id', $id)->first();
        $engTestimony->name = $request->input('name');
        if ($engTestimony->isDirty('name')) {
            $this->saveToLogWithData(self::INITIATIVES, $testimony->initiative_id,'Testimoniar name edited', $engTestimonyPrev->name, $engTestimony->name);
        }
        $engTestimony->text = $request->input('text');
        if ($engTestimony->isDirty('text')) {
            $this->saveToLogWithData(self::INITIATIVES, $testimony->initiative_id,'Testimony text edited', $engTestimonyPrev->text, $engTestimony->text);
        }
        $engTestimony->timestamps = false;
        $engTestimony->save();
        return redirect()->route('initiatives.testimonies.index', [$request->input('initiative_id')])->with('success', 'Testimony edited');
    }

    public function destroy($id)
    {
        $testimony = Testimony::find($id);
        Testimony::destroy($id);
        TestimonyEnglish::where('testimony_id', $id)->delete();
        TestimonyFrench::where('testimony_id', $id)->delete();
        File::delete(public_path($testimony->image_path));
        $this->saveToLog(self::INITIATIVES, $testimony->initiative_id, 'Testimony deleted');
        return redirect()->route('initiatives.testimonies.index', [$testimony->initiative_id])->with('success', 'Testimony deleted');
    }
}
