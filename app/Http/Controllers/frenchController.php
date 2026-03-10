<?php

namespace App\Http\Controllers;

use App\Initiative;
use App\InitiativeFrench;
use App\ProjectFrench;
use App\Success;
use App\Testimony;
use Illuminate\Http\Request;
use App\Image;
use App\Project;
use App\News;
use Illuminate\Support\Facades\DB;

class frenchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','french'], ['except' => ['show']]);
    }

    public function index(){
        $projectsNT = Project::with('english','place')
            ->where('MPE_French','0')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();
        $projectsT = Project::with('english','place')
            ->where('MPE_French','1')
            ->orderby('id','desc')
            ->get();
        $initiativesNT = Initiative::with('english', 'whatCategory')
            ->where('french_translation','0')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();
        $initiativesT = Initiative::with('english', 'whatCategory')
            ->where('french_translation','1')
            ->orderby('id','desc')
            ->get();
        $testimoniesNT = Testimony::with('initiativeEnglish')
            ->where('french_translation','0')
            ->orderby('id','desc')
            ->get();
        $testimoniesT = Testimony::with('initiativeEnglish')
            ->where('french_translation','1')
            ->orderby('id','desc')
            ->get();
        $successesNT = Success::with('english')
            ->where('french_translation','0')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();
        $successesT = Success::with('english')
            ->where('french_translation','1')
            ->orderby('id','desc')
            ->get();

        $newsNT = News::with('english')
            ->where('french_translation','0')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();
        $newsT = News::with('english')
            ->where('french_translation','1')
            ->orderby('id','desc')
            ->get();

        return view('admin.french.projects-index',
            ['projectsNT' => $projectsNT,
            'projectsT' => $projectsT,
            'initiativesNT' => $initiativesNT,
            'initiativesT' => $initiativesT,
            'testimoniesNT' => $testimoniesNT,
            'testimoniesT' => $testimoniesT,
            'successesNT' => $successesNT,
            'successesT' => $successesT,

            'newsNT' => $newsNT,
            'newsT' => $newsT,
            ]);
    }

    public function translate($id){
        $project = Project::with('english')->where('id',$id)->first();
        return view('admin.french.project-translate', ['project' => $project]);
    }

    public function store(Request $request){
        $request->validate([
            'MicroProject_ID' => 'required|numeric',
            'project_id' => 'required|numeric',
            'name' => 'required',
            'suffering' => 'required',
            'expSkill' => 'required',
        ]);
        DB::table('projects')->where('id',$request->input('project_id'))->update(['MPE_French' => '1']);
        $frenchProject = new ProjectFrench;
        $frenchProject->MicroProject_ID = $request->input('MicroProject_ID');
        $frenchProject->project_id = $request->input('project_id');
        $frenchProject->MPE_SuccessStory = '0';
        $frenchProject->MPE_Name = $request->input('name');
        $frenchProject->MPE_Suffering = $request->input('suffering');
        $frenchProject->MPE_ExpSkill = $request->input('expSkill');
        $frenchProject->translation_paid = '0';
        $frenchProject->timestamps = false;
        $frenchProject->save();
        $this->saveToLog(self::MICRO, $request->input('MicroProject_ID'),'Translated');
        return redirect('admin/projects/french-index')->with('success','Project '.$request->input('MicroProject_ID').' has been added to translated projects');
    }

    public function update(Request $request){
        $request->validate([
            'MicroProject_ID' => 'required|numeric',
            'name' => 'required',
            'suffering' => 'required',
            'expSkill' => 'required',
        ]);
        $frenchProject = ProjectFrench::where('project_id', $request->input('project_id'))->first();
        $previousData = ProjectFrench::where('project_id', $request->input('project_id'))->first();

        $frenchProject->MPE_Name = $request->input('name');
        if ($frenchProject->isDirty('MPE_Name')) {
            $this->saveToLogWithData(self::MICRO, $request->input('MicroProject_ID'),'Project Name Edited (French)', $previousData->MPE_Name, $frenchProject->MPE_Name);
        }
        $frenchProject->MPE_Suffering = $request->input('suffering');
        if ($frenchProject->isDirty('MPE_Suffering')) {
            $this->saveToLogWithData(self::MICRO, $request->input('MicroProject_ID'),'Story Edited (French)', $previousData->MPE_Suffering, $frenchProject->MPE_Suffering);
        }

        $frenchProject->MPE_ExpSkill = $request->input('expSkill');
        if ($frenchProject->isDirty('MPE_ExpSkill')) {
            $this->saveToLogWithData(self::MICRO, $request->input('MicroProject_ID'),'Story Edited (French)', $previousData->MPE_ExpSkill, $frenchProject->MPE_ExpSkill);
        }

        $frenchProject->timestamps = false;
        $frenchProject->save();

        $projectsNT = Project::with('english')->where('MPE_French','0')->where('english_check', '1')->get();
        $projectsT = Project::with('english')->where('MPE_French','1')->where('english_check', '1')->get();

        $initiativesNT = Initiative::with('english', 'whatCategory')
            ->where('french_translation','0')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();
        $initiativesT = Initiative::with('english', 'whatCategory')->where('english_check', '1')
            ->where('french_translation','1')
            ->orderby('id','desc')
            ->get();

        $successesNT = Success::with('english')
            ->where('french_translation','0')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();
        $successesT = Success::with('english')
            ->where('french_translation','1')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();
        $newsNT = News::with('english')
            ->where('french_translation','0')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();
        $newsT = News::with('english')
            ->where('french_translation','1')->where('english_check', '1')
            ->orderby('id','desc')
            ->get();

        $testimoniesNT = Testimony::with('initiativeEnglish')
            ->where('french_translation','0')
            ->orderby('id','desc')
            ->get();
        $testimoniesT = Testimony::with('initiativeEnglish')
            ->where('french_translation','1')
            ->orderby('id','desc')
            ->get();

        return view('admin.french.projects-index'
            , ['projectsNT' => $projectsNT,
               'projectsT' => $projectsT ,
                'initiativesNT' => $initiativesNT,
                'initiativesT' => $initiativesT,
                'testimoniesNT' => $testimoniesNT,
                'testimoniesT' => $testimoniesT,
                'successesNT' => $successesNT,
                'successesT' => $successesT,
                'newsNT' => $newsNT,
                'newsT' => $newsT  ])
            ->with('success','Project '.$request->input('MicroProject_ID').' has been updated');
    }

    public function edit($id){
        $project = Project::with('english','french')->where('id' ,$id)->first();
        if (is_null($project)){
            return 'project doesn\'t exist';
        } elseif (is_null($project->french)){
            return 'project '.$id.' is not translated';
        }
        return view('admin.french.project-edit', ['project' => $project]);
    }

    public function show($id){
        if (!is_numeric($id)) {
            return view('errors.404');
        }
        $microProject = Project::with('french')->where('id', $id)->get();
        if (count($microProject) == 0) {
            return view('errors.404');
        }
        $images = Image::where('project_id',$id)->get();
        return view('admin.french.project-view')->with('microProject', $microProject)->with('images', $images)->with('iCount', $images->count());
    }

    public function make_paid($id){
        $project = ProjectFrench::where('project_id' ,$id)->first();
        $project->timestamps = false;
        $project->translation_paid = '1';
        $project->save();
        $this->saveToLog(self::MICRO, $id, 'Translation Paid');
    }

    public function make_paid_all()
    {
        $projects = ProjectFrench::where('translation_paid', 0)->get();
        foreach ($projects as $project) {
            $project->timestamps = false;
            $project->translation_paid = '1';
            $project->save();
            $this->saveToLog(self::MICRO, $project->MicroProject_ID, 'Translation Paid');
        }
        $initiatives = InitiativeFrench::where('translation_paid' , 0)->get();
        foreach ($initiatives as $initiative){
            $initiative->translation_paid = '1';
            $initiative->save();
            $this->saveToLog(self::INITIATIVES, $initiative->initiative_id, 'Translation Paid');
        }
        $successes = SuccessFrench::where('translation_paid' , 0)->get();
        foreach ($successes as $success){
            $success->translation_paid = '1';
            $success->save();
            $this->saveToLog(self::SUCCESSES, $success->success_id, 'Translation Paid');
        }
        $news = NewsFrench::where('translation_paid' , 0)->get();
        foreach ($news as $one_news){
            $one_news->translation_paid = '1';
            $one_news->save();
            $this->saveToLog(self::NEWS, $one_news->news_id, 'Translation Paid');
        }
    }
}
