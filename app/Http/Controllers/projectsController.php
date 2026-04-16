<?php

namespace App\Http\Controllers;

use App\Donor;
use App\Place;
use App\ProjectEnglish;
use App\Image;
use App\Project;
use App\ProjectType;
use App\ProjectSubType;
use function Symfony\Component\HttpKernel\Debug\push;
use Validator;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\ProjectSubCategory;
use App\User;
use Illuminate\Support\Facades\Auth;

class projectsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::with('roles', 'places', 'centers')->find(Auth::id());

        $places = Place::where('is_micro',1)
            ->orderByRaw("FIELD(name,'Aleppo', 'Damascus', 'Homs', 'Latakia', 'Al Wadi','Idleb','Tartus')")
            ->get();

        $user_places = $user->places->pluck('id')->toArray();
        $allplaces = $places->pluck('id')->toArray();

        if (empty($user_places) || $user_places[0] == 0) {
            $user_places = $allplaces; // fallback to all places
        }
// Active / Published projects
        $allPlacesProjects = [];
        foreach ($places as $place) {
            if (in_array($place->id, $user_places)) {
                $allPlacesProjects[$place->name] = Project::with('english', 'donor', 'place', 'type', 'subtype')
                    ->where('MPE_City', $place->id)
                    ->where('MPE_Published', 1)
                    ->get();
            }
        }

// Cancelled projects only from allowed places
        $allProjectsCanceled = Project::with('english', 'donor', 'place', 'type', 'subtype')
            ->whereIn('MPE_City', $user_places)
            ->where('MPE_Done', 2)
            ->orderBy('MicroProject_ID', 'asc')
            ->get();

// Pending projects only from allowed places
        $allProjectsPending = Project::with('english', 'donor', 'place', 'type', 'subtype')
            ->whereIn('MPE_City', $user_places)
            ->where('MPE_Published', 0)
            ->orderBy('MicroProject_ID', 'asc')
            ->get();
//        $projectsAleppo = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '3')->where('MPE_Published',1)->get();
//        $projectsHoms = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '1')->where('MPE_Published',1)->get();
//        $projectsDamascus = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '2')->where('MPE_Published',1)->get();
//        $projectsLatakia = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '4')->where('MPE_Published',1)->get();
//        $projectsWadi = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '7')->where('MPE_Published',1)->get();

//        $projectsCanceled = Project::with('place')->where('MPE_Done', '2')->orderby('MicroProject_ID', 'asc')->get();

//        $projectsPending = Project::with('place', 'images')->where('MPE_Published', '0')->orderby('MicroProject_ID', 'asc')->get();
        return view('new.admin.projects-index', [ 'places'=>$places,'allPlacesProjects' => $allPlacesProjects,
            //'projectsAleppo' => $projectsAleppo, 'projectsHoms' => $projectsHoms, 'projectsDamascus' => $projectsDamascus, 'projectsLatakia' => $projectsLatakia,'projectsWadi' => $projectsWadi,
            'allProjectsCanceled' => $allProjectsCanceled, 'allProjectsPending' => $allProjectsPending]);
    }

    public function indexjson()
    {
        $user = User::with('roles', 'places', 'centers')->where('id', Auth::id())->get()[0];
        $places = Place::all();
        $user_places = [];
        $allplaces = [];
        foreach ($user['places'] as $i) {
            array_push($user_places, $i->id);
        }

        foreach ($places as $i) {
            array_push($allplaces, $i->id);
        }
        if ($user_places == null || array_pluck($user_places, 0)) {
            $user_places = $allplaces;
        }

        $user_places_string = implode(",", $user_places);

//        $projectsAll = Project::with('english','donor','place')->get();
        $projectsAleppo = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '3')->get();
        $projectsHoms = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '1')->get();
        $projectsDamascus = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '2')->get();

        $projectsCanceled = Project::with('place')->where('MPE_Done', '2')->orderby('MicroProject_ID', 'asc')->get();
        $projectsPending = Project::with('place', 'images')->where('MPE_Published', '0')->orderby('MicroProject_ID', 'asc')->get();

        $projectsAleppo = DB::select('SELECT projects.id as "NO", projects.MPE_Published,projects.`MicroProject_ID`,projects_english.`MPE_Name`,projecttype.name as \'type\',projects.`MPE_BeneficiaryName`,projects.`MPE_Video`,projects.`Mobile`,projects.`MPE_FundedDate`,projects.`latitude`,projects.`longtitude`,donors.code as \'MPE_Donor\',count(images.id) as \'images\'
FROM projects
LEFT JOIN projects_english on projects.id = projects_english.project_id
LEFT JOIN donors on donors.id = projects.MPE_Donor
LEFT JOIN projecttype on projects.projecttype_id = projecttype.id
LEFT JOIN images on projects.id = images.project_id
WHERE projects.MPE_City = 3 AND `MPE_Published` = 1 GROUP BY projects.id;
 ');

        $projectsHoms = DB::select('SELECT projects.id as "NO", projects.MPE_Published,projects.`MicroProject_ID`,projects_english.`MPE_Name`,projecttype.name as \'type\',projects.`MPE_BeneficiaryName`,projects.`MPE_Video`,projects.`Mobile`,projects.`MPE_FundedDate`,projects.`latitude`,projects.`longtitude`,donors.code as \'MPE_Donor\',count(images.id) as \'images\'
FROM projects
LEFT JOIN projects_english on projects.id = projects_english.project_id
LEFT JOIN donors on donors.id = projects.MPE_Donor
LEFT JOIN projecttype on projects.projecttype_id = projecttype.id
LEFT JOIN images on projects.id = images.project_id
WHERE projects.MPE_City = 1 AND `MPE_Published` = 1 GROUP BY projects.MicroProject_ID;
 ');

        $projectsDamascus = DB::select('SELECT projects.id as "NO", projects.MPE_Published,projects.`MicroProject_ID`,projects_english.`MPE_Name`,projecttype.name as \'type\',projects.`MPE_BeneficiaryName`,projects.`MPE_Video`,projects.`Mobile`,projects.`MPE_FundedDate`,projects.`latitude`,projects.`longtitude`,donors.code as \'MPE_Donor\',count(images.id) as \'images\'
FROM projects
LEFT JOIN projects_english on projects.id = projects_english.project_id
LEFT JOIN donors on donors.id = projects.MPE_Donor
LEFT JOIN projecttype on projects.projecttype_id = projecttype.id
LEFT JOIN images on projects.id = images.project_id
WHERE projects.MPE_City = 2 AND `MPE_Published` = 1 GROUP BY projects.MicroProject_ID;
 ');

        $projectsLatakia = DB::select('SELECT projects.id as "NO", projects.MPE_Published,projects.`MicroProject_ID`,projects_english.`MPE_Name`,projecttype.name as \'type\',projects.`MPE_BeneficiaryName`,projects.`MPE_Video`,projects.`Mobile`,projects.`MPE_FundedDate`,projects.`latitude`,projects.`longtitude`,donors.code as \'MPE_Donor\',count(images.id) as \'images\'
FROM projects
LEFT JOIN projects_english on projects.id = projects_english.project_id
LEFT JOIN donors on donors.id = projects.MPE_Donor
LEFT JOIN projecttype on projects.projecttype_id = projecttype.id
LEFT JOIN images on projects.id = images.project_id
WHERE projects.MPE_City = 4 AND `MPE_Published` = 1 GROUP BY projects.MicroProject_ID;
 ');

        $projectsWadi = DB::select('SELECT projects.id as "NO", projects.MPE_Published,projects.`MicroProject_ID`,projects_english.`MPE_Name`,projecttype.name as \'type\',projects.`MPE_BeneficiaryName`,projects.`MPE_Video`,projects.`Mobile`,projects.`MPE_FundedDate`,projects.`latitude`,projects.`longtitude`,donors.code as \'MPE_Donor\',count(images.id) as \'images\'
FROM projects
LEFT JOIN projects_english on projects.id = projects_english.project_id
LEFT JOIN donors on donors.id = projects.MPE_Donor
LEFT JOIN projecttype on projects.projecttype_id = projecttype.id
LEFT JOIN images on projects.id = images.project_id
WHERE projects.MPE_City = 7 AND `MPE_Published` = 1 GROUP BY projects.MicroProject_ID;
 ');

        $projectsCanceled = DB::select('SELECT projects.id as "NO", projects.MPE_Published,projects.`MicroProject_ID`,projects_english.`MPE_Name`,projecttype.name as \'type\',projects.`MPE_BeneficiaryName`,projects.`MPE_Video`,projects.`Mobile`,projects.`MPE_FundedDate`,projects.`latitude`,projects.`longtitude`,donors.code as \'MPE_Donor\',count(images.id) as \'images\',places.name as \'City\'
FROM projects
LEFT JOIN projects_english on projects.id = projects_english.project_id
LEFT JOIN donors on donors.id = projects.MPE_Donor
LEFT JOIN projecttype on projects.projecttype_id = projecttype.id
LEFT JOIN images on projects.id = images.project_id
LEFT JOIN places on places.id = projects.MPE_City
WHERE projects.MPE_Done = 2  GROUP BY projects.MicroProject_ID;
 ');

        $projectsPending = DB::select('SELECT projects.id as "NO", projects.MPE_Published,projects.`MicroProject_ID`,projects_english.`MPE_Name`,projecttype.name as \'type\',projects.`MPE_BeneficiaryName`,projects.`MPE_Video`,projects.`Mobile`,projects.`MPE_FundedDate`,projects.`latitude`,projects.`longtitude`,donors.code as \'MPE_Donor\',count(images.id) as \'images\' ,places.name as \'City\'
FROM projects
LEFT JOIN projects_english on projects.id = projects_english.project_id
LEFT JOIN donors on donors.id = projects.MPE_Donor
LEFT JOIN projecttype on projects.projecttype_id = projecttype.id
LEFT JOIN images on projects.id = images.project_id
LEFT JOIN places on places.id = projects.MPE_City
WHERE projects.`MPE_Published` = 0  GROUP BY projects.MicroProject_ID;
 ');
        return response()->json(['projectsAleppo'=>$projectsAleppo,'projectsHoms'=>$projectsHoms,'projectsDamascus'=>$projectsDamascus,'projectsLatakia'=>$projectsLatakia,'projectsCanceled'=>$projectsCanceled,'projectsPending'=>$projectsPending]);
       }

    public function create()
    {
        $places = Place::Where('is_micro', '1')->get();
        $donors = Donor::Where('is_micro', '1')->get();
        $types = ProjectType::get();
//        $subtypes = ProjectSubType::get();
        $subcategories = ProjectSubCategory::get();
        return view('new.admin.project-create', ['subcategories' => $subcategories ,'places' => $places, 'donors' => $donors, 'types' => $types]);
    }

    public function store(Request $request)
    {
        $request->validate(['MicroProject_ID' => 'required|numeric', 'name' => 'required', 'beneficiary' => 'required', 'suffering' => 'required', 'city' => 'required', 'donor' => 'required', 'DOB' => 'required|numeric|min:1900', 'FamilyMembers' => 'required|numeric|min:0',

            'projecttype' => 'required|numeric', 'projectsubcategory' => 'required|numeric',
        ]);
        if ($request->input('donor') == '9' && $request->input('status') == '1') {
            return 'donor can\'t be empty when status is funded';
        }

        $project = new Project;
        $mp_id = $request->input('MicroProject_ID');
        $city_id = $request->input('city');

        $query = DB::select('select id from projects where projects.MicroProject_ID = '.$mp_id.' and projects.MPE_City = '.$city_id.';');
        if (!empty($query)){
            return redirect()->back()->with('error', 'Project already exists in this City');
        }
        $project->MicroProject_ID = $request->input('MicroProject_ID');
        $project->MPE_BeneficiaryName = $request->input('beneficiary');

        $project->MPE_FundedDate = $request->filled('fundDate') ? $request->input('fundDate') : null;

        $project->DOB = $request->input('DOB');
        $project->FamilyMembers = $request->filled('FamilyMembers') ? $request->input('FamilyMembers') : '0';

//        $project->WorkLoss = $request->input('WorkLoss');

        $project->MPE_AllMoneyNeeded = '0';
        $project->MPE_Donor = $request->input('donor');
        $project->MPE_City = $request->input('city');
        $project->projecttype_id = $request->input('projecttype');
        $project->SubCategory_ID = $request->input('projectsubcategory');

        $project->MPE_Video = $request->filled('video') ? $request->input('video') : '0';
        $project->Mobile = $request->filled('mobile') ? $request->input('mobile') : '0';

        $project->MPE_PartnerName = $request->filled('partner') ? $request->input('partner') : '0';
        $project->MPE_PartnerName2 = $request->filled('partner2') ? $request->input('partner2') : '0';

        $project->latitude = $request->filled('latitude') ? $request->input('latitude') : '0';
        $project->longtitude = $request->filled('longtitude') ? $request->input('longtitude') : '0';

//        $project->MPE_Location = $project->latitude.','.$project->longtitude;

        $project->MPE_MoneyDonated = '0';

        $project->MPE_French = '0';
        $project->timestamps = false;

        $project->MPE_Published = '0';  // not online //
        $project->MPE_PublishDate = $request->filled('fundDate') ? $request->input('fundDate') : null;

        $project->MPE_Done = '1';       // funded //
        $project->save();

        $engProject = new ProjectEnglish;
        $engProject->project_id = $project->id;
        $engProject->MicroProject_ID = $request->input('MicroProject_ID');
        $engProject->MPE_SuccessStory = '0';
        $engProject->MPE_Name = $request->input('name');
        $engProject->MPE_Suffering = $request->input('suffering');
        $engProject->MPE_ExpSkill = $request->filled('expSkill') ? $request->input('expSkill') : '';
        $engProject->timestamps = false;
        $engProject->save();

        $this->saveToLog(self::MICRO, $project->id, 'Project has been Created');
        return redirect()->back()->with('success', 'Project created');
    }

    public function edit($id)
    {

        $project = Project::with('english', 'place', 'donor', 'type', 'subtype')->where('id', $id)->first();
        $places = Place::Where('is_micro', '1')->get();
        $donors = Donor::Where('is_micro', '1')->get();
        $types = ProjectType::get();
//        $subtypes = ProjectSubType::get();
        $subcategories = ProjectSubCategory::get();
        if (is_null($project)) {
            return 'project doesn\'t exist';
        }

        return view('new.admin.project-edit', ['subcategories'=>$subcategories,'project' => $project, 'places' => $places, 'donors' => $donors, 'types' => $types]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['MicroProject_ID' => 'required|numeric', 'name' => 'required', 'beneficiary' => 'required', 'suffering' => 'required', 'city' => 'required', 'donor' => 'required', 'status' => 'required', 'DOB' => 'required|numeric|min:1900', 'FamilyMembers' => 'numeric|min:0',

            'projecttype' => 'required|numeric', 'projectsubcategory' => 'required|numeric',
        ]);
        if ($request->input('donor') == '-1' && $request->input('status') == '1') {
            return 'donor can\'t be empty when status is funded';
        }
        $project = Project::find($id);
        $previousData = Project::find($id);

        $project->MPE_BeneficiaryName = $request->input('beneficiary');
        if ($project->isDirty('MPE_BeneficiaryName')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Beneficiary Name Edited', $previousData->MPE_BeneficiaryName, $project->MPE_BeneficiaryName);
        }
        $project->MPE_PartnerName = $request->filled('partner') ? $request->input('partner') : '0';
        if ($project->isDirty('MPE_PartnerName')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Partner Name Edited', $previousData->MPE_PartnerName, $project->MPE_PartnerName);
        }
        $project->MPE_PartnerName2 = $request->filled('partner2') ? $request->input('partner2') : '0';
        if ($project->isDirty('MPE_PartnerName2')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Second Partner Name Edited', $previousData->MPE_PartnerName2, $project->MPE_PartnerName2);
        }

        $project->MPE_FundedDate = $request->input('fundDate');
        if ($project->isDirty('MPE_FundedDate')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Funded Date Edited', $previousData->MPE_FundedDate, $project->MPE_FundedDate);
        }
        $project->DOB = $request->input('DOB');
        if ($project->isDirty('DOB')) {
            $this->saveToLogWithData(self::MICRO, $id, 'DOB Edited', $previousData->DOB, $project->DOB);
        }
        $project->FamilyMembers = $request->input('FamilyMembers');
        if ($project->isDirty('FamilyMembers')) {
            $this->saveToLogWithData(self::MICRO, $id, 'DOB Edited', $previousData->FamilyMembers, $project->FamilyMembers);
        }

//        $project->WorkLoss = $request->input('WorkLoss');
//        if ($project->isDirty('WorkLoss')) {
//            $this->saveToLogWithData(self::MICRO, $id, 'WorkLoss Edited', $previousData->WorkLoss, $project->WorkLoss);
//        }
        $project->latitude = $request->filled('latitude') ? $request->input('latitude') : '0';
        $project->longtitude = $request->filled('longtitude') ? $request->input('longtitude') : '0';

//        $project->MPE_Location = $project->MPE_Location = $project->latitude.','.$project->longtitude;

        if($project->isDirty('latitude')){
            $this->saveToLogWithData(self::MICRO, $id, 'Location Latitude Edited', $previousData->latitude, $project->latitude);
        }

        if($project->isDirty('longtitude')){
            $this->saveToLogWithData(self::MICRO, $id, 'Location Longtitude Edited', $previousData->longtitude, $project->longtitude);
        }

//        if ($project->isDirty('MPE_Location')) {
//            $this->saveToLogWithData(self::MICRO, $id, 'Location Edited', $previousData->MPE_Location, $project->MPE_Location);
//        }

        $project->MPE_Donor = $request->input('donor');
        if ($project->isDirty('MPE_Donor')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Donor Edited', $previousData->MPE_Donor, $project->MPE_Donor);
        }

        $project->projecttype_id = $request->input('projecttype');
        if ($project->isDirty('projecttype_id')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Project Type Edited', $previousData->projecttype_id, $project->projecttype_id);
        }
        $project->SubCategory_ID = $request->input('projectsubcategory');
        if ($project->isDirty('projectsubtype_id')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Project Sub Type Edited', $previousData->projectsubtype_id, $project->projectsubtype_id);
        }

        $project->MPE_City = $request->input('city');

        $project->Mobile = $request->filled('mobile') ? $request->input('mobile') : '0';
        if ($project->isDirty('Mobile')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Mobile Edited', $previousData->Mobile, $project->Mobile);
        }

        $project->MPE_Video = $request->filled('video') ? $request->input('video') : '0';
        if ($project->isDirty('MPE_Video')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Video Edited', $previousData->MPE_Video, $project->MPE_Video);
        }
        $project->MPE_Done = $request->input('status');
        if ($project->isDirty('MPE_Done')) {
            switch ($previousData->MPE_Done) {
                case '0':
                case '1':
                    $previous_status = 'Funded';
                    $current_status = 'Cancelled';
                    $project->MPE_Published = '2';

                    break;
                case '2':
                    $previous_status = 'Cancelled';
                    $current_status = 'Funded';
                    $project->MPE_Published = '0';
                    break;
            }
            $this->saveToLogWithData(self::MICRO, $id, 'Status Edited', $previous_status, $current_status);
        }
        $project->timestamps = false;
        $project->save();

        $engProject = ProjectEnglish::where('project_id', $id)->first();
        $previousData = ProjectEnglish::where('project_id', $id)->first();

        $engProject->MPE_Name = $request->input('name');
        if ($engProject->isDirty('MPE_Name')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Project Name Edited', $previousData->MPE_Name, $engProject->MPE_Name);
        }
        $engProject->MPE_Suffering = $request->input('suffering');
        if ($engProject->isDirty('MPE_Suffering')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Story Edited', $previousData->MPE_Suffering, $engProject->MPE_Suffering);
        }

        $engProject->MPE_ExpSkill = $request->input('expSkill');
        if ($engProject->isDirty('MPE_ExpSkill')) {
            $this->saveToLogWithData(self::MICRO, $id, 'Exp & Skill Edited', $previousData->MPE_ExpSkill, $engProject->MPE_ExpSkill);
        }

        $engProject->timestamps = false;
        $engProject->save();

//        if($project->MPE_Published == '1') {
////            return redirect('new/admin/projects/index')->with('success', 'Project '.$request->input('MicroProject_ID').' has been updated');
//            return redirect()->route('projects_index')->with('success', 'Project '.$request->input('MicroProject_ID').' has been updated');
//        }
//        else {
//            return redirect('new/admin/home')->with('success', 'Project '.$request->input('MicroProject_ID').' has been updated');
        return redirect('admin\home')->with('success', 'Project ' . $request->input('MicroProject_ID') . ' has been updated');
//        }
    }

    public function delete(Request $request)
    {
        $id = $request->form;
        $project = Project::find($id);
        DB::table('projects')->where('id', $id)->delete();
        DB::table('projects_english')->where('project_id', $id)->delete();
        DB::table('projects_french')->where('project_id', $id)->delete();
        $images = DB::table('images')->where('project_id', $id)->get();
        DB::table('images')->where('project_id', $id)->delete();
        foreach ($images as $image) {
            File::delete($image->MPI_Path, substr($image->MPI_Path, 0, -4) . 'b.jpg');
        }
        $this->saveToLog(self::MICRO, $id, 'Project Deleted');
        return response()->json('Project has been deleted');
//        return redirect()->back()->with('success', 'Project ' . $project->id . ' deleted');
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $microProject = Project::with('english', 'donor','place')->where('id', $id)->get();
        if (count($microProject) == 0) {
            return view('new.errors.404');
        }
        $images = Image::where('project_id', $id)->orderby('image_order','asc')->get();

        return view('new.admin.project-view')->with('microProject', $microProject)->with('images', $images)->with('iCount', $images->count());
    }

    public function publish(Request $request)
    {
        $project = Project::where('id', $request->input('id'))->first();

        $project->MPE_Published = '1'; // Online
        $project->MPE_PublishDate = Carbon::now("Asia/Damascus");
        $project->MPE_Done = '1';   // Funded

        $project->timestamps = false;
        $project->save();
        $this->saveToLog(self::MICRO, $request->input('id'), 'Made Online');
        return redirect('admin/home')->with('success', 'Project ' . $request->input('id') . ' is online');
    }

    public function unpublish($id)
    {
        $project = Project::with('place')->where('id', $id)->first();
        $project->MPE_Published = '0';
        $project->MPE_PublishDate = Carbon::now("Asia/Damascus");

        $project->timestamps = false;
        $project->save();
        $this->saveToLog(self::MICRO, $id , 'Made Offline');
        return redirect()->back()->with('success', 'Project ' . $id . ' is offline');
    }

    public function Englishchecked(Request $request)
    {
        $project = Project::where('id', $request->input('id'))->first();
        $project->english_check = '1';
        $project->timestamps = false;
        $project->save();
        $this->saveToLog(self::MICRO, $request->input('id'), 'English Checked');
        return redirect()->back()->with('success', 'Project ' . $request->input('MicroProject_ID') . ' English Checked');
    }

    public function show_projects()
    {
        $projectsAll = Project::with('english', 'donor', 'place', 'type', 'subtype')->get();
        $projectsAleppo = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '3')->get();
        $projectsHoms = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '1')->get();
        $projectsDamascus = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '2')->get();
        $projectsLatakia = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '4')->get();
        $projectsWadi = Project::with('english', 'donor', 'place', 'type', 'subtype')->where('MPE_City', '7')->get();
        return view('new.admin.projects-private', ['projectsAll' => $projectsAll, 'projectsAleppo' => $projectsAleppo, 'projectsHoms' => $projectsHoms, 'projectsDamascus' => $projectsDamascus,'projectsLatakia' => $projectsLatakia, 'projectsWadi' => $projectsWadi]);
    }

    ////////////////// Image Section /////////////////
    public function add_image($id)
    {
        $project = Project::with('english')->where('id', $id)->first();
        $places = Place::Where('is_micro', '1')->get();
        $donors = Donor::Where('is_micro', '1')->get();


        $images = Image::where('project_id', $id)->orderby('image_order','asc')->get();
        return view('new.admin.add-image', ['project' => $project, 'images' => $images, 'donors' => $donors, 'places' => $places,

        ]);
    }

    public function store_image(Request $request)
    {
        $project = Project::where('id', $request->input('project_id'))->first();
        if($project->MPE_Published == '1'){
            $project->MPE_Published = '0';
            $project->MPE_PublishDate = Carbon::now("Asia/Damascus");

            $project->timestamps = false;
            $project->save();
            $this->saveToLog(self::MICRO, $request->input('project_id') , 'Made Offline');
        }
        $request->validate(['MicroProject_ID' => 'required|numeric', 'project_id' => 'required|numeric',]);
        $validator = Validator::make($request->all(), ['small_image' => 'max:' . count($request->file('big_image')),]);
        if ($validator->fails()) {
            return redirect('/admin/add-image/' . $request->input('MicroProject_ID'))->withErrors('the number of small images must be the same as the number of big images')->withInput();
        }
        foreach (range(0, count($request->file('small_image')) - 1) as $i) {
            $request->validate(['small_image.' . $i => 'mimes:jpeg|max:200']);
        }
        foreach (range(0, count($request->file('big_image')) - 1) as $i) {
            $request->validate(['big_image.' . $i => 'mimes:jpeg|max:600|min:250']);
        }

        $city = $request->input('City');

        $images = new \MultipleIterator();
        $images->attachIterator(new \ArrayIterator($request->file('small_image')));
        $images->attachIterator(new \ArrayIterator($request->file('big_image')));
        foreach ($images as $i => $image) {
            $imgName = (string)time() . $i[0];
            if ($city == 'Aleppo') {
                $path = 'images/projects/' . $request->input('MicroProject_ID') . '/';
            } elseif ($city == 'Homs') {
                $path = 'images/projects_homs/' . $request->input('MicroProject_ID') . '/';
            } elseif ($city == 'Damascus') {
                $path = 'images/projects_damascus/' . $request->input('MicroProject_ID') . '/';
            } elseif ($city == 'Latakia') {
                $path = 'images/projects_latakia/' . $request->input('MicroProject_ID') . '/';
            } elseif ($city == 'Al Wadi') {
                $path = 'images/projects_wadi/' . $request->input('MicroProject_ID') . '/';
            } elseif ($city == 'Tartus') {
                $path = 'images/projects_tartus/' . $request->input('MicroProject_ID') . '/';
            } elseif ($city == 'Idleb') {
                $path = 'images/projects_idleb/' . $request->input('MicroProject_ID') . '/';
            }

            $image[0]->move($path, $imgName . '.jpg');
            $image[1]->move($path, $imgName . 'b.jpg');

            $projectImage = new Image;
            $projectImage->MPI_Path = '/'.$path . $imgName . '.jpg';
            $projectImage->MicroProject_ID = $request->input('MicroProject_ID');
            $projectImage->project_id = $request->input('project_id');
            $projectImage->timestamps = false;
            $projectImage->save();
        }
        $this->saveToLog(self::MICRO, $request->input('project_id'), count($request->file('small_image')) . ' Images stored');

        $project = Project::where('id', $request->input('project_id'))->first();
        $images = Image::where('project_id', $request->input('project_id'))->get();

        return view('new.admin.add-image', ['project' => $project, 'images' => $images])->with('success', count($request->file('small_image')) . ' Images stored');
    }

    public function delete_images(Request $request, $id)
    {
        $project = Project::where('id', $id)->first();

        if ($project->MPE_Published == '1') {
            $project->MPE_Published = '0';
            $project->MPE_PublishDate = Carbon::now("Asia/Damascus");

            $project->timestamps = false;
            $project->save();

            $this->saveToLog(self::MICRO, $id, 'Made Offline');
        }

        $selectedImages = $request->input('selected_images', []);

        foreach (array_keys($selectedImages) as $imageId) {
            $img = Image::find($imageId);

            if ($img && $img->project_id == $id) {
                File::delete($img->MPI_Path);
                File::delete(substr($img->MPI_Path, 0, -4) . 'b.jpg');
                $img->delete();
            }
        }

        // refresh images
        $images = Image::where('project_id', $id)
            ->orderBy('image_order')
            ->get();

        $this->saveToLog(self::MICRO, $id, 'Image Deleted');

        return view('new.admin.add-image', [
            'project' => $project,
            'images' => $images
        ])->with('success', 'Selected images removed');
    }

    public function order_images(Request $request){
        $imageIdsArray = $request->input('imageIds');
        $count = 1;
        foreach ($imageIdsArray as $id) {
            $image = Image::find($id);
            $image->image_order = $count;
            $image->save();
            $count ++;
        }
        return 'Images has been reordered !!';
    }
    ///////////////////////////////////////////////////
}
