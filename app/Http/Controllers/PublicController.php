<?php

namespace App\Http\Controllers;

use App\Donor;
use App\Edition;
use App\HopeProjects;
use App\Initiative;
use App\InitiativeImage;
use App\InitiativeImageRehabilitation;
use App\Mail\UserSubscribedEmail;
use App\Models\Cover;
use App\Models\InfoDisc;
use App\Models\News;
use App\Models\NewsImage;
use App\Models\ProjectDonor;
use App\Models\RootsOfHope;
use App\Models\Subscribers;
use App\Place;
use App\Project;
use App\Student;
use App\SubWhatCategory;
use App\Success;
use App\Testimony;
use App\WhatCategory;
use App\WhoCategory;
use App\YouthProfile;
use Carbon\Carbon;
use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use PDF;
use function Monolog\toArray;

class publicController extends Controller
{
    public function set_locale($locale)
    {
        session(['locale' => $locale]);
        return redirect()->back();
    }

    public function homepage()
    {
        $pageName = 'home';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $agent = new Agent();
        $carouselImages = Cover::where('what_category_id',0)->orderBy('image_order', 'asc')->select('image_path')->get();
        $fundedCount = Project::whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->count();

        $familyMembersCount = Project::whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->sum('FamilyMembers');

        $workLossCount = Project::where('WorkLoss', '1')->whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->count();
        $workLossRatio = $workLossCount * 100 / $fundedCount;
        $workLossRatio = number_format($workLossRatio, 2, '.', '');

        $lastEdition = Edition::latest()->first();
        $date = Carbon::parse('2059-09-01');
        $now = Carbon::now();

        $difference = $date->diffAsCarbonInterval($now);

        $edition = Edition::all()->select('id')->last();

        $years = $difference->years;
        $months = $difference->months;
        $days = $difference->dayz;

        return view('new.public.home', [
            'carouselImages'=>$carouselImages,
            'edition' => $edition,
            'years' => $years,
            'months' => $months,
            'dayz' => $days,
            'agent' => $agent,
            'fundedCount' => $fundedCount,
            'familyMembersCount' => $familyMembersCount,
            'lastEdition' => $lastEdition,
            'workLossRatio' => $workLossRatio,
            'pageViews' => $pageTracker->views
        ]);
    }

    public function homepage_lb()
    {
        //$currentPath= Route::getFacadeRoot()->current()->uri();
        //$route = Route::getCurrentRoute()->getPath();

        $test = request()->getHttpHost();
        if (str_contains($test, 'hcsyria')) return \Redirect::route('new.public.home'); else if (str_contains($test, 'hclebanon')) return view('public.coming-soon'); else return \Redirect::route('new.public.home');
//        return view('public.coming-soon');
    }

    public function test()
    {
        //$currentPath= Route::getFacadeRoot()->current()->uri();
        //$route = Route::getCurrentRoute()->getPath();

        $test = request()->getHttpHost();
        return view('public.test');
    }

    public function roots()
    {
        $pageName = 'roots_of_hope';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $agent = new \Jenssegers\Agent\Agent();
        $edition = \App\Edition::all()->select('id')->last();
        $roots = \App\Models\RootsOfHope::where('online',1)->get();
        $latest_root = \App\Models\RootsOfHope::where('online',1)->get()->last();

        return view('new.public.rootsofhope', [
            'edition' => $edition,
            'agent' => $agent,
            'roots'=>$roots,
            'latest_root'=>$latest_root
        ]);
    }
    public function micro_project_new(Request $request)
    {
        $partners_ongoing = ProjectDonor::where('what_category_id',10)->with('donors')->where('isActive',1)->orderBy('rank','asc')->get();
        $partners_previous = ProjectDonor::where('what_category_id',10)->with('donors')->where('isActive',0)->orderBy('rank','asc')->get();

        $carouselImages = Cover::where('what_category_id',10)->orderBy('image_order', 'asc')->select('image_path')->get();
        $brief = HopeProjects::with('media')
            ->where('what_category_id', 10)
            ->first();
        // Done =    funded + Canceled
        // Publish = online + Hidden



        $counts = Project::select('MPE_City', DB::raw('COUNT(*) as total'))
            ->whereIn('MPE_City', [1, 2, 3, 4, 7])
            ->whereIn('MPE_Done', [1, 2])
            ->whereIn('MPE_Published', [1, 2])
            ->groupBy('MPE_City')
            ->pluck('total', 'MPE_City');

        $aleppoCount   = $counts[3] ?? 0;
        $homsCount     = $counts[1] ?? 0;
        $damascusCount = $counts[2] ?? 0;
        $latakiaCount  = $counts[4] ?? 0;
        $wadiCount     = $counts[7] ?? 0;

        $allCount = $counts->sum();
        $familyMembersCount = Project::whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->sum('FamilyMembers');
        $edition = Edition::all()->select('id')->last();
        $categories = DB::select('SELECT
    subcategory.Name,
    COUNT(projects.id) AS project_count
FROM
    projects
    LEFT JOIN subcategory on subcategory.ID = projects.SubCategory_ID
WHERE projects.MPE_Published in (1,2)
AND projects.MPE_Done in (1)
AND projects.SubCategory_ID not in (1,2)
GROUP BY
    subcategory.Name
HAVING subcategory.Name is not null
ORDER BY `project_count` DESC  LIMIT 5;
');

        $agerange = DB::select('SELECT
    age.Name,
    COUNT(projects.id) AS project_count
FROM
    projects
    LEFT JOIN age ON (CASE WHEN YEAR(CURDATE()) - projects.DOB = 0 THEN 1 ELSE YEAR(CURDATE()) - projects.DOB END) BETWEEN age.Min AND age.Max
WHERE projects.MPE_Published in (1,2)
AND projects.MPE_Done in (1)
GROUP BY
    age.Name
HAVING age.Name is not null
ORDER BY age.ID;');
        $sustainableRate = DB::select('SELECT ROUND
(
	(
    (SELECT COUNT(id)
		FROM `projects`
		WHERE MPE_Published = 1
		and MPE_Done = 1
		and MPE_FundedDate <= DATE_SUB(now(), INTERVAL 9 MONTH)
	)
	* 100
	)
	/
	(SELECT COUNT(id)
		FROM `projects`
		WHERE MPE_Published <> 0
	)
,0) as \'number\'
from projects LIMIT 1;');
        if (session('locale') == 'fr') {
            $language = 'french';
            $languageTable = 'projects_french';
        } else {
            $language = 'english';
            $languageTable = 'projects_english';
        }

        $donors = Donor::where('is_micro', '1')->whereNotIn('id', [9, 10])->orderby('rank')->get();
        $searchStr = strtolower(addslashes($request->input('search')));

        ////////// donor ///////////////
        if ($request->has('donor')) {
            if ($request->input('donor') == 'all') {
                $donor = '';
                $donor_var = '';
            } else {
                $donor = $request->input('donor');
                $one_donor = Donor::where('abb_name', $donor)->get();
                $donor_var = $one_donor[0]->id;
            }
        } else {
            $donor = '';
            $donor_var = '';
        }

        ////////// city ///////////////
        if ($request->has('city')) {
            $city = $request->input('city');
        } else {
            $city = '';
        }
        ////////// video ///////////////
        if ($request->has('video')) {
            if ($request->input('video') == 'true') {
                $video = true;
            } else {
                $video = false;
            }
        } else {
            $video = false;
        }
        $microProjectAIDs = $this->get_projects_IDs($searchStr, $donor_var, '3', $video, $languageTable);
        $microProjectDIDs = $this->get_projects_IDs($searchStr, $donor_var, '2', $video, $languageTable);
        $microProjectHIDs = $this->get_projects_IDs($searchStr, $donor_var, '1', $video, $languageTable);
        $microProjectLIDs = $this->get_projects_IDs($searchStr, $donor_var, '4', $video, $languageTable);
        $microProjectWIDs = $this->get_projects_IDs($searchStr, $donor_var, '7', $video, $languageTable);
        if ($searchStr != '') {

            $microProjectA = Project::with('images', $language, 'donor')//              ->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')
            ->whereIn('projects.id', Arr::pluck($microProjectAIDs, 'id'))->orderBy('MPE_PublishDate', 'desc')//                ->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')
            ->paginate(5, ['*'], 'microProjectA')->appends(request()->except('microProjectA'));


            $microProjectH = Project::with('images', $language, 'donor')//                ->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')
            ->whereIn('projects.id', Arr::pluck($microProjectHIDs, 'id'))->orderBy('MPE_PublishDate', 'desc')//                ->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')
            ->paginate(5, ['*'], 'microProjectH')->appends(request()->except('microProjectH'));

            $microProjectD = Project::with('images', $language, 'donor')//                ->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')
            ->whereIn('projects.id', Arr::pluck($microProjectDIDs, 'id'))->orderBy('MPE_PublishDate', 'desc')//                ->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')
            ->paginate(5, ['*'], 'microProjectD')->appends(request()->except('microProjectD'));
            $microProjectL = Project::with('images', $language, 'donor')//                ->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')
            ->whereIn('projects.id', Arr::pluck($microProjectLIDs, 'id'))->orderBy('MPE_PublishDate', 'desc')//                ->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')
            ->paginate(5, ['*'], 'microProjectL')->appends(request()->except('microProjectL'));

            $microProjectW = Project::with('images', $language, 'donor')//                ->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')
            ->whereIn('projects.id', Arr::pluck($microProjectWIDs, 'id'))->orderBy('MPE_PublishDate', 'desc')//                ->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')
            ->paginate(5, ['*'], 'microProjectW')->appends(request()->except('microProjectW'));
        } else {
            $microProjectA = Project::with('images', $language, 'donor')->whereIn('projects.id', Arr::pluck($microProjectAIDs, 'id'))->orderBy('MPE_PublishDate', 'desc')->paginate(5, ['*'], 'microProjectA')->appends(request()->except('microProjectA'));

            $microProjectH = Project::with('images', $language, 'donor')->whereIn('projects.id', Arr::pluck($microProjectHIDs, 'id'))->orderByRaw('MPE_PublishDate desc')->paginate(5, ['*'], 'microProjectH')->appends(request()->except('microProjectH'));

            $microProjectD = Project::with('images', $language, 'donor')->whereIn('projects.id', Arr::pluck($microProjectDIDs, 'id'))->orderByRaw('MPE_PublishDate desc')->paginate(5, ['*'], 'microProjectD')->appends(request()->except('microProjectD'));

            $microProjectL = Project::with('images', $language, 'donor')->whereIn('projects.id', Arr::pluck($microProjectLIDs, 'id'))->orderByRaw('MPE_PublishDate desc')->paginate(5, ['*'], 'microProjectL')->appends(request()->except('microProjectL'));

            $microProjectW = Project::with('images', $language, 'donor')->whereIn('projects.id', Arr::pluck($microProjectWIDs, 'id'))->orderByRaw('MPE_PublishDate desc')->paginate(5, ['*'], 'microProjectW')->appends(request()->except('microProjectW'));
        }

        foreach ($microProjectA as $mp) {
            $mp->lang = $mp->$language;
        }
        foreach ($microProjectH as $mp) {
            $mp->lang = $mp->$language;
        }
        foreach ($microProjectD as $mp) {
            $mp->lang = $mp->$language;
        }
        foreach ($microProjectL as $mp) {
            $mp->lang = $mp->$language;
        }
        foreach ($microProjectW as $mp) {
            $mp->lang = $mp->$language;
        }
        $searchProject = $this->search_list_projects($languageTable);
        $projectCopy = $this->get_project_copy2($request->input('project'), $language, '');
        $projectCopyA = $this->get_project_copy2($request->input('projectA'), $language, '3');
        $projectCopyD = $this->get_project_copy2($request->input('projectD'), $language, '2');
        $projectCopyH = $this->get_project_copy2($request->input('projectH'), $language, '1');
        $projectCopyL = $this->get_project_copy2($request->input('projectL'), $language, '4');
        $projectCopyW = $this->get_project_copy2($request->input('projectW'), $language, '7');

        $searchBeneficiary = $this->search_list_beneficiaries();
//        $aleppoMap = DB::select('select latitude , longtitude from projects where MPE_City = 1');
        $aleppoMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectAIDs, 'id'))->orderByRaw('case
                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
                                 else 0 end asc')->get();
        $homsMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectHIDs, 'id'))->orderByRaw('case
                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
                                 else 0 end asc')->get();

        $damasMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectDIDs, 'id'))->orderByRaw('case
                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
                                 else 0 end asc')->get();
        $latakiaMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectLIDs, 'id'))->orderByRaw('case
                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
                                 else 0 end asc')->get();
        $wadiMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectWIDs, 'id'))->orderByRaw('case
                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
                                 else 0 end asc')->get();
        $agent = new Agent();


        if ($request->ajax()) {
            return view('new.public.micro-project', compact(['microProjectA']))->render();
        }
        return view('new.public.micro-project', ['brief'=>$brief, 'carouselImages'=>$carouselImages, 'microProjectA' => $microProjectA,'microProjectW' => $microProjectW, 'microProjectL' => $microProjectL, 'microProjectH' => $microProjectH, 'microProjectD' => $microProjectD, 'edition' => $edition, 'searchProject' => $searchProject, 'searchBeneficiary' => $searchBeneficiary, 'donors' => $donors,

            'donor' => $donor, 'city' => $city, 'video' => $video, 'latakiaMap' => $latakiaMap,'wadiMap' => $wadiMap, 'search' => $searchStr,

            'projectCopyA' => $projectCopyA,'projectCopyW' => $projectCopyW, 'projectCopyH' => $projectCopyH, 'projectCopyD' => $projectCopyD, 'projectCopyL' => $projectCopyL,

            'familyMembersCount' => $familyMembersCount, 'agerange'=>$agerange,'partners_ongoing'=> $partners_ongoing,'partners_previous'=> $partners_previous,

            'sustainableRate' => $sustainableRate, 'categories' => $categories,'wadiCount' => $wadiCount,

            'allCount' => $allCount, 'aleppoCount' => $aleppoCount, 'homsCount' => $homsCount, 'latakiaCount' => $latakiaCount, 'damascusCount' => $damascusCount, 'aleppoMap' => $aleppoMap, 'homsMap' => $homsMap, 'damasMap' => $damasMap, 'agent' => $agent]);
    }

    function micro_project_new_test(Request $request)
    {
        $pageName = 'micro_projects';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $partners_ongoing = ProjectDonor::where('what_category_id', 10)->with('donors')->where('isActive', 1)->orderBy('rank', 'asc')->get();
        $partners_previous = ProjectDonor::where('what_category_id', 10)->with('donors')->where('isActive', 0)->orderBy('rank', 'asc')->get();

        $carouselImages = Cover::where('what_category_id', 10)->orderBy('image_order', 'asc')->select('image_path')->get();
        $brief = HopeProjects::with('media')
            ->where('what_category_id', 10)
            ->first();
        // Done =    funded + Canceled
        // Publish = online + Hidden

        //statistics start
        $counts = Project::select('MPE_City', DB::raw('COUNT(*) as total'))
            ->whereIn('MPE_City', [1, 2, 3, 4,6, 7,8])
            ->whereIn('MPE_Done', [1, 2])
            ->whereIn('MPE_Published', [1, 2])
            ->groupBy('MPE_City')
            ->pluck('total', 'MPE_City');

        $aleppoCount   = $counts[3] ?? 0;
        $homsCount     = $counts[1] ?? 0;
        $damascusCount = $counts[2] ?? 0;
        $latakiaCount  = $counts[4] ?? 0;
        $wadiCount     = $counts[7] ?? 0;
        $idlebCount = $counts[8] ?? 'SOON';
        $tartusCount = $counts[6] ?? 0;

        $allCount = $counts->sum();
        $familyMembersCount = Project::whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->sum('FamilyMembers');
        $edition = Edition::all()->select('id')->last();
        $categories = DB::select('SELECT
    subcategory.Name,
    COUNT(projects.id) AS project_count
FROM
    projects
    LEFT JOIN subcategory on subcategory.ID = projects.SubCategory_ID
WHERE projects.MPE_Published in (1,2)
AND projects.MPE_Done in (1)
AND projects.SubCategory_ID not in (1,2)
GROUP BY
    subcategory.Name
HAVING subcategory.Name is not null
ORDER BY `project_count` DESC  LIMIT 5;
');

        $agerange = DB::select('SELECT
    age.Name,
    COUNT(projects.id) AS project_count
FROM
    projects
    LEFT JOIN age ON (CASE WHEN YEAR(CURDATE()) - projects.DOB = 0 THEN 1 ELSE YEAR(CURDATE()) - projects.DOB END) BETWEEN age.Min AND age.Max
WHERE projects.MPE_Published in (1,2)
AND projects.MPE_Done in (1)
GROUP BY
    age.Name
HAVING age.Name is not null
ORDER BY age.ID;');
        $sustainableRate = DB::select('SELECT ROUND
(
    (
    (SELECT COUNT(id)
       FROM `projects`
       WHERE MPE_Published = 1
       and MPE_Done = 1
       and MPE_FundedDate <= DATE_SUB(now(), INTERVAL 9 MONTH)
    )
    * 100
    )
    /
    (SELECT COUNT(id)
       FROM `projects`
       WHERE MPE_Published <> 0
    )
,0) as \'number\'
from projects LIMIT 1;');
        if (session('locale') == 'fr') {
            $language = 'french';
            $languageTable = 'projects_french';
        } else {
            $language = 'english';
            $languageTable = 'projects_english';
        }

        $donors = $this->getSortedDonors([9, 10], true);

//        $aleppoMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectAIDs, 'id'))->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')->get();
//        $homsMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectHIDs, 'id'))->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')->get();
//
//        $damasMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectDIDs, 'id'))->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')->get();
//        $latakiaMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectLIDs, 'id'))->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')->get();
//        $wadiMap = Project::with('images', $language)->leftJoin($languageTable, $languageTable . '.project_id', '=', 'projects.id')->whereIn('projects.id', Arr::pluck($microProjectWIDs, 'id'))->orderByRaw('case
//                                 when LOWER(MPE_Name) like \'%' . $searchStr . '%\' then -2
//                                 when LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\' then -1
//                                 else 0 end asc')->get();
        $agent = new Agent();

        return view('new.public.micro-project-new-test', ['brief' => $brief, 'carouselImages' => $carouselImages,
//            'microProjectA' => $microProjectA,'microProjectW' => $microProjectW, 'microProjectL' => $microProjectL, 'microProjectH' => $microProjectH, 'microProjectD' => $microProjectD,
            'edition' => $edition, 'donors' => $donors,
//            'searchProject' => $searchProject, 'searchBeneficiary' => $searchBeneficiary,
//
//            'donor' => $donor, 'city' => $city, 'video' => $video, 'latakiaMap' => $latakiaMap,'wadiMap' => $wadiMap, 'search' => $searchStr,
//
//            'projectCopyA' => $projectCopyA,'projectCopyW' => $projectCopyW, 'projectCopyH' => $projectCopyH, 'projectCopyD' => $projectCopyD, 'projectCopyL' => $projectCopyL,

            'familyMembersCount' => $familyMembersCount, 'agerange' => $agerange, 'partners_ongoing' => $partners_ongoing, 'partners_previous' => $partners_previous,

            'sustainableRate' => $sustainableRate, 'categories' => $categories, 'wadiCount' => $wadiCount,

            'allCount' => $allCount, 'aleppoCount' => $aleppoCount, 'homsCount' => $homsCount, 'latakiaCount' => $latakiaCount, 'damascusCount' => $damascusCount, 'idlebCount' => $idlebCount , 'tartusCount'=>$tartusCount ,
//            'aleppoMap' => $aleppoMap, 'homsMap' => $homsMap, 'damasMap' => $damasMap,
            'agent' => $agent]);
    }
    public function get_projects_IDs($searchStr, $donor, $city, $video, $langTable)
    {
        if ($donor == '') {
            $donorString = '';
        } else {
            $donorString = ' and MPE_Donor like ' . $donor;
        }

        if ($city == '') {
            $cityString = '';
        } else {
            $cityString = ' and MPE_City like ' . $city;
        }
        if ($video == false) {
            $videoString = '';
        } else {
            $videoString = " and MPE_Video <> '0'";
        }

        $microproject_id_string = '';
        if ($searchStr != '' && is_numeric($searchStr)) {
            $microproject_id_string = ' or projects.MicroProject_ID = ' . $searchStr;
        }

        return DB::Select('select projects.id from projects inner join ' . $langTable . '
                                    on ' . $langTable . '.project_id = projects.id
                                    where (LOWER(MPE_Name) like \'%' . $searchStr . '%\'
                                    ' . $microproject_id_string . '
                                    or LOWER(MPE_BeneficiaryName) like \'%' . $searchStr . '%\'
                                    or LOWER(MPE_PartnerName) like \'%' . $searchStr . '%\'
                                    or LOWER(MPE_PartnerName2) like \'%' . $searchStr . '%\')
                                    and MPE_Published in (1,2)
                                    and MPE_Done in (1,2) ' . $donorString . $cityString . $videoString . '
                                    order by MPE_PublishDate desc ');
    }

    public function get_cuactivities_IDs($searchStr, $langTable)
    {

        return DB::Select('select initiatives.id from initiatives inner join ' . $langTable . '
                                    on ' . $langTable . '.initiative_id = initiatives.id
                                    where what_category_id = 17
                                    and online = 1
                                    and (LOWER(title) like \'%' . $searchStr . '%\'
                                    or LOWER(content) like \'%' . $searchStr . '%\'
                                    or LOWER(description) like \'%' . $searchStr . '%\' )
                                    order by initiatives_english.initiative_id');
    }

    public function get_leapactivities_IDs($searchStr, $langTable)
    {

        return DB::Select('select initiatives.id from initiatives inner join ' . $langTable . '
                                    on ' . $langTable . '.initiative_id = initiatives.id
                                    where what_category_id = 19
                                    and online = 1
                                    and (LOWER(title) like \'%' . $searchStr . '%\'
                                    or LOWER(content) like \'%' . $searchStr . '%\'
                                    or LOWER(description) like \'%' . $searchStr . '%\' )
                                    order by initiatives_english.initiative_id');
    }

    public function get_szactivities_IDs($searchStr, $langTable)
    {

        return DB::Select('select initiatives.id from initiatives inner join ' . $langTable . '
                                    on ' . $langTable . '.initiative_id = initiatives.id
                                    where what_category_id = 7
                                    and online = 1
                                    and (LOWER(title) like \'%' . $searchStr . '%\'
                                    or LOWER(content) like \'%' . $searchStr . '%\'
                                    or LOWER(description) like \'%' . $searchStr . '%\' )
                                    order by initiatives_english.initiative_id');
    }

    public function get_discactivities_IDs($searchStr, $langTable)
    {

        return DB::Select('select initiatives.id from initiatives inner join ' . $langTable . '
                                    on ' . $langTable . '.initiative_id = initiatives.id
                                    where what_category_id = 5
                                    and online = 1
                                    and (LOWER(title) like \'%' . $searchStr . '%\'
                                    or LOWER(content) like \'%' . $searchStr . '%\'
                                    or LOWER(description) like \'%' . $searchStr . '%\' )
                                    order by initiatives_english.initiative_id');
    }

    public function search_list_projects($langTable)
    {
        return DB::select('SELECT DISTINCT MPE_Name FROM projects
                                     inner join ' . $langTable . '
                                     on ' . $langTable . '.project_id = projects.id
                                     WHERE MPE_Published = \'1\' ');
    }

    public function search_list_cu_activities($langTable)
    {
        return DB::select('SELECT DISTINCT title FROM initiatives
                                     inner join ' . $langTable . '
                                     on ' . $langTable . '.initiative_id = initiatives.id
                                     where what_category_id = 17');
    }

    public function search_list_leap_activities($langTable)
    {
        return DB::select('SELECT DISTINCT title FROM initiatives
                                     inner join ' . $langTable . '
                                     on ' . $langTable . '.initiative_id = initiatives.id
                                     where what_category_id = 19');
    }

    public function search_list_SZ_activities($langTable)
    {
        return DB::select('SELECT DISTINCT title FROM initiatives
                                     inner join ' . $langTable . '
                                     on ' . $langTable . '.initiative_id = initiatives.id
                                     where what_category_id = 7');
    }

    public function search_list_DISC_activities($langTable)
    {
        return DB::select('SELECT DISTINCT title FROM initiatives
                                     inner join ' . $langTable . '
                                     on ' . $langTable . '.initiative_id = initiatives.id
                                     where what_category_id = 5');
    }
//    public function  micro_project_video(Request $request){
//        $allCount = Project::whereIn('MPE_Done',[1,2])->whereIn('MPE_Published',[1,2])->count();
//        $aleppoCount = Project::where('MPE_City','3')->whereIn('MPE_Done',[1,2])->whereIn('MPE_Published',[1,2])->count();
//        $homsCount = Project::where('MPE_City','1')->whereIn('MPE_Done',[1,2])->whereIn('MPE_Published',[1,2])->count();
//        $damascusCount = Project::where('MPE_City','2')->whereIn('MPE_Done',[1,2])->whereIn('MPE_Published',[1,2])->count();
//
//        if (session('locale') == 'fr') {
//            $language = 'french';
//            $languageTable = 'projects_french';
//        } else {
//            $language = 'english';
//            $languageTable = 'projects_english';
//        }
//        $microProjectA = Project::with('images',$language)
//            ->where('MPE_Video' ,$request->input('ID'))
//            ->orderBy('MPE_PublishDate',' desc')
//            ->paginate(12, ['*'], 'microProjectA');
//        return view('public.micro-project2', [
//            'microProjectA' => $microProjectA,
//            'allCount' => $allCount,
//            'aleppoCount' => $aleppoCount,
//            'homsCount' => $homsCount,
//            'damascusCount' => $damascusCount]);
//    }
    public function get_project_copy2($id, $lang, $city)
    {
        $project = Project::with('english', 'images')->where('id', $id)->where('MPE_Done', '1')->where('MPE_City', $city)->first();
        if (isset($project)) {
            $project->lang = $project->$lang;
            unset($project->$lang);
        } else {
            return 'none';
        }
        return $project;
    }
//    public function get_project_copy($id, $lang)
//    {
//        $project = Project::with('english', 'images')
//            ->where('MicroProject_ID', $id)
//            ->where('MPE_Done', '1')
//            ->first();
//        if (isset($project)) {
//            $project->lang = $project->$lang;
//            unset($project->$lang);
//        } else {
//            return 'none';
//        }
//        return $project;
//    }
    public function search_list_beneficiaries()
    {
        $mainNames = DB::select('select DISTINCT MPE_BeneficiaryName from projects WHERE MPE_Published = \'1\' ORDER BY MPE_BeneficiaryName');
        $partnerNames = DB::select('select DISTINCT MPE_PartnerName from projects WHERE MPE_PartnerName != \'0\' AND MPE_Published = \'1\' ORDER BY MPE_PartnerName');
        $partnerNames2 = DB::select('select DISTINCT MPE_PartnerName2 from projects WHERE MPE_PartnerName2 != \'0\' AND MPE_Published = \'1\' ORDER BY MPE_PartnerName2');
        $mainNames = collect($mainNames);
        foreach ($partnerNames as $pn) {
            $pn->MPE_BeneficiaryName = $pn->MPE_PartnerName;
            unset($pn->MPE_PartnerName);
        }
        foreach ($partnerNames2 as $pn) {
            $pn->MPE_BeneficiaryName = $pn->MPE_PartnerName2;
            unset($pn->MPE_PartnerName2);
        }
        $names = $mainNames->merge($partnerNames)->merge($partnerNames2);
        return $names->unique();
    }

    public function get_initiatives_IDs($searchStr, $langTable)
    {
        return DB::select('select initiatives.id  from initiatives inner join ' . $langTable . '
                                    on ' . $langTable . '.initiative_id = initiatives.id
                                    where (LOWER(title) like \'%' . $searchStr . '%\'
                                    or LOWER(organization) like \'% ' . $searchStr . ' %\'
                                    or LOWER(description) like \'%' . $searchStr . '%\'
                                    or LOWER(content) like \'%' . $searchStr . '%\')');
    }

    public function search_list_initiatives($langTable)
    {
        return DB::select('SELECT DISTINCT title FROM initiatives
                                     inner join ' . $langTable . '
                                     on ' . $langTable . '.initiative_id = initiatives.id
                                     WHERE online = \'1\'');
    }

    public function get_event_copy($id, $lang)
    {
        $inititive = Initiative::with('english', 'images', 'place', 'center')->where('id', $id)->where('online', '1')->first();
        if (isset($inititive)) {
            $inititive->lang = $inititive->$lang;
            unset($inititive->$lang);
        } else {
            return 'none';
        }
        return $inititive;
    }

    public function get_study_copy($id, $lang)
    {
        $inititive = Initiative::with('english', 'images', 'place', 'center')->where('id', $id)->where('online', '1')->first();
        if (isset($inititive)) {
            $inititive->lang = $inititive->$lang;
            unset($inititive->$lang);
        } else {
            return 'none';
        }
        return $inititive;
    }

//    public function initiative($type, $id, $slug)
//    {
//        if (!is_numeric($id)) {
//            return view('new.errors.404');
//        }
//
//        $mainInitiative = Initiative::with('english', 'french', 'whatCategory', 'donors')
//            ->where('id', $id)
//            ->where('online', '1')
//            ->where('sub_what_category_id', '!=', '2')// f2f stories
//            ->first();
//
//        if (!isset($mainInitiative)) {
//            return view('new.errors.404');
//        }
//        if (($type != Str::slug(strtolower($mainInitiative->whatCategory->name))) || ($slug != Str::slug(strtolower($mainInitiative->english->title)))) {
//            return view('new.errors.404');
//        }
//        $initiativePath = $type . '/' . $id . '-' . Str::slug(strtolower($mainInitiative->english->title));
//        $images = InitiativeImage::where('initiative_id', $id)->get();
//        $imagesRehabilitation = InitiativeImageRehabilitation::where('initiative_id', $id)->get();
//        if (!count($images))
//            $images = [['path' => $imagesRehabilitation[0]->path_1]];
//        $initiativesSameType = Initiative::with('english', 'french', 'firstImage')
//            ->where('id', '!=', $mainInitiative->id)
//            ->where('sub_what_category_id', '!=', '2')// f2f stories
//            ->where('what_category_id', $mainInitiative->what_category_id)
//            ->where('online', '1')
//            ->inRandomOrder()
//            ->limit(3)
//            ->get();
//        $removeIDs = $initiativesSameType->pluck('id');
//        $removeIDs->prepend($mainInitiative->id);
//        $initiativesSameCategory = Initiative::with('english', 'french', 'firstImage', 'SubWhatCategory')
//            ->whereNotIn('id', $removeIDs)
//            ->where('sub_what_category_id', '!=', '2')// f2f stories
//            ->where('who_category_id', $mainInitiative->who_category_id)
//            ->where('online', '1')
//            ->inRandomOrder()
//            ->limit(4)
//            ->get();
//        foreach ($initiativesSameType as $initiative)
//            if (is_null($initiative->firstImage))
//                $initiative->firstImage = collect(['path' => InitiativeImageRehabilitation::where('initiative_id', $initiative->id)
//                    ->first()->path_1]);
//        foreach ($initiativesSameCategory as $initiative)
//            if (is_null($initiative->firstImage))
//                $initiative->firstImage = collect(['path' => InitiativeImageRehabilitation::where('initiative_id', $initiative->id)
//                    ->first()->path_1]);
//        $testimonies = Testimony::with('english', 'french')
//            ->where('initiative_id', $id)
//            ->where('french_translation', '1')
//            ->get();
//        $stories = Initiative::with('english', 'french', 'firstImage', 'images')
//            ->where('sub_what_category_id', '2')// f2f stories
//            ->where('partner_id', $id)
//            ->where('online', '1')
//            ->get();
//        $relatedPosts = $initiativesSameType->toArray();
//        foreach ($initiativesSameType as $type) {
//            $initiativesSameCategory->add($type);
//        }
//        return view('new.public.initiative', [
//            'mainInitiative' => $mainInitiative,
//            'images' => $images,
//            'imagesRehabilitation' => $imagesRehabilitation,
//            'initiativePath' => $initiativePath,
//            'initiativesSameType' => $initiativesSameType,
//            'initiativesSameCategory' => $initiativesSameCategory,
//            'testimonies' => $testimonies,
//            'relatedPosts' => $relatedPosts,
//            'stories' => $stories,
//        ]);
//    }

    public function initiative($type, $id, $slug)
    {
        $edition = Edition::all()->select('id')->last();

        if (!is_numeric($id)) {
            return view('new.errors.404' . ['edition' => $edition,]);
        }


        $mainInitiative = Initiative::with('english', 'french', 'whatCategory', 'donors')->where('id', $id)->where('online', '1')->where(function ($query) {
                $query->where('sub_what_category_id', '<>', 2)->orWhereNull('sub_what_category_id');
            })->first();
        if (!isset($mainInitiative)) {
            return view('new.errors.404', ['edition' => $edition]);
        }
        if (($type != Str::slug(strtolower($mainInitiative->whatCategory->name))) || ($slug != Str::slug(strtolower($mainInitiative->english->title)))) {
            return view('new.errors.404', ['edition' => $edition]);
        }
        $initiativePath = $type . '/' . $id . '-' . Str::slug(strtolower($mainInitiative->english->title));
        $images = InitiativeImage::where('initiative_id', $id)->orderby('image_order')->get();
        $imagesRehabilitation = InitiativeImageRehabilitation::where('initiative_id', $id)->get();
        if (!count($images)) $images = [['path' => $imagesRehabilitation[0]->path_1]];
        $initiativesSameType = Initiative::with('english', 'french', 'firstImage')
            ->where('id', '!=', $mainInitiative->id)
            ->where('what_category_id', $mainInitiative->what_category_id)
//            ->where('who_category_id', $mainInitiative->who_category_id)
            ->where('online', '1')
            ->where(function ($query) {
                $query->where('sub_what_category_id', '<>', 2)
                    ->orWhereNull('sub_what_category_id');
            })
            ->inRandomOrder()->limit(3)->get();

        $removeIDs = $initiativesSameType->pluck('id');
        $removeIDs->prepend($mainInitiative->id);
        $initiativesSameCategory = Initiative::with('english', 'french', 'firstImage', 'subWhatCategory')->whereNotIn('id', $removeIDs)->where('who_category_id', $mainInitiative->who_category_id)->where('online', '1')->inRandomOrder()->limit(4)->get();
//        $initiativesSameCategory = Initiative::with('english', 'french', 'firstImage', 'SubWhatCategory')->whereNotIn('id', $removeIDs)
//            ->where(function ($query) {
//                $query->where('sub_what_category_id', '<>', 2)
//                    ->orWhereNull('sub_what_category_id');
//            })
//        ->where('who_category_id', $mainInitiative->who_category_id)->where('online', '1')->inRandomOrder()->limit(4)->get();
        foreach ($initiativesSameType as $initiative) if (is_null($initiative->firstImage)) $initiative->firstImage = collect(['path' => InitiativeImageRehabilitation::where('initiative_id', $initiative->id)->first()->path_1]);
        foreach ($initiativesSameCategory as $initiative) if (is_null($initiative->firstImage)) $initiative->firstImage = collect(['path' => InitiativeImageRehabilitation::where('initiative_id', $initiative->id)->first()->path_1]);
        $testimonies = Testimony::with('english', 'french')->where('initiative_id', $id)->where('french_translation', '1')->get();
//        $stories = Initiative::with('english', 'french', 'firstImage', 'images')->where('sub_what_category_id', '2')// f2f stories
//        ->where('partner_id', $id)->where('online', '1')->get();

//        $relatedPosts = array_merge($initiativesSameCategory->toArray(), $initiativesSameType->toArray());

        return view('new.public.initiative-test', ['edition' => $edition, 'mainInitiative' => $mainInitiative, 'images' => $images, 'imagesRehabilitation' => $imagesRehabilitation, 'initiativePath' => $initiativePath, 'initiativesSameType' => $initiativesSameType, 'initiativesSameCategory' => $initiativesSameCategory, 'testimonies' => $testimonies, //            'stories' => $stories,
//            'relatedPosts' => $relatedPosts
        ]);
    }

    public function initiatives_by_type($type)
    {
        $pageName = match (Str::lower($type)) {
            'social-activities'   => 'social_activities_all',
            'cash-aid-earthquake' => 'cash-aid-earthquake',
            'relief'              => 'relief_all',
            'rehabilitation'      => 'Rehabilitation',
            'earthquake-response' => 'Earthquake_response_all',
            default               => 'initiatives_' . Str::slug($type, '_'),
        };

        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!Session::has($sessionKey)) {
            $pageTracker->increment('views');
            Session::put($sessionKey, true);
        }

        $agent = new Agent();

        $edition = Edition::all()->select('id')->last();
        $whatCategory = WhatCategory::whereRaw('replace(lower(name)," ","-") LIKE "' . $type . '"')->first();

        if (is_null($whatCategory)) {
            return view('new.errors.404', ['edition' => $edition]);
        }

        $carouselImages = Cover::where('what_category_id',$whatCategory->id)->orderBy('image_order', 'asc')->select('image_path')->get();

        $initiatives = Initiative::with('english', 'french', 'ImagesRandom')->where('what_category_id', $whatCategory->id)->where('online', '1')->orderBy('id', 'desc')->get();

        if ($whatCategory->id == '3') {
            foreach ($initiatives as $initiative) {
                $imagesRehabilitation = InitiativeImageRehabilitation::where('initiative_id', $initiative->id)->get();
                foreach ($imagesRehabilitation as $image) {
                    $initiative->ImagesRandom->push(['path' => $image->path_1]);
                    $initiative->ImagesRandom->push(['path' => $image->path_2]);
                }
                $randomImages = $initiative->ImagesRandom->shuffle()->all();
                unset($initiative->ImagesRandom);
                $initiative->ImagesRandom = $randomImages;
            }
        }

        if ($whatCategory->id == '6') {
            $testemonies = Success::with('english', 'french')->where('what_category_id', '6')//Homework Room
            ->where('who_category_id', '4')//Children
            ->where('online', '1')->get();

            return view('new.public.initiatives', ['initiatives' => $initiatives, 'whatCategory' => $whatCategory, 'testemonies' => $testemonies, 'agent' => $agent]);
        } else {

            return view('new.public.initiatives', ['carouselImages'=>$carouselImages,'edition' => $edition, 'initiatives' => $initiatives, 'whatCategory' => $whatCategory, 'agent' => $agent]);
        }
    }
    public function school_to_school()
    {
        $pageName = 'school_to_school';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $agent = new Agent();
        $brief = HopeProjects::with('media')
            ->where('what_category_id', 9)
            ->first();
        $partners_ongoing = ProjectDonor::where('what_category_id',9)->with('donors')->where('isActive',1)->orderBy('rank','asc')->get();
        $partners_previous = ProjectDonor::where('what_category_id',9)->with('donors')->where('isActive',0)->orderBy('rank','asc')->get();
        $carouselImages = Cover::where('what_category_id',9)->orderBy('image_order', 'asc')->select('image_path')->get();
        $edition = Edition::all()->select('id')->last();
        $photos = ['/images/initiatives/School to School/letter1.jpg', '/images/initiatives/School to School/letter2.jpg', '/images/initiatives/School to School/letter3.jpg'];

        $initiatives = Initiative::with('english', 'french', 'ImagesRandom', 'firstImage')//            ->join('initiatives_english','initiatives.id','initiative_id')
        ->where('what_category_id', 9)->where('online', '1')->orderBy('rank')->get();

        return view('new.public.school-to-school', ['partners_ongoing'=>$partners_ongoing,'partners_previous'=>$partners_previous,'brief'=>$brief,'carouselImages'=>$carouselImages,'edition' => $edition, 'photos' => $photos, 'initiatives' => $initiatives, 'agent' => $agent]);
    }
    public function initiativeOfProject($type, $id, $slug)
    {
        $edition = Edition::all()->select('id')->last();
        if (!is_numeric($id)) {
            return view('new.errors.404' . ['edition' => $edition,]);
        }
        $mainInitiative = Initiative::with('english', 'french', 'whatCategory', 'subWhatCategory')->where('id', $id)->where('online', '1')->first();

        $subWhatCategory = SubWhatCategory::whereRaw('replace(lower(name)," ","-") LIKE "' . $type . '"')->first();
        if (is_null($mainInitiative) || is_null($subWhatCategory)) {
            return view('new.errors.404');
        }
        if (($slug != Str::slug(strtolower($mainInitiative->english->title))) || ($type != Str::slug(strtolower($subWhatCategory->name)))) {
            return view('new.errors.404');
        }
        if ($mainInitiative->what_category_id != $subWhatCategory->what_category_id) return view('new.errors.404', ['edition' => $edition]);
        $initiativePath = Str::slug(strtolower($mainInitiative->whatCategory->name)) . '/' . Str::slug(strtolower($mainInitiative->subWhatCategory->name)) . '/' . $id . '-' . Str::slug(strtolower($mainInitiative->english->title));
        $images = InitiativeImage::where('initiative_id', $id)->orderby('image_order')->get();
        $initiativesSameType = Initiative::with('english', 'french', 'firstImage')->where('id', '!=', $mainInitiative->id)->where('what_category_id', $mainInitiative->what_category_id)->where('who_category_id', $mainInitiative->who_category_id)->where('online', '1')->inRandomOrder()->limit(3)->get();
        $removeIDs = $initiativesSameType->pluck('id');
        $removeIDs->prepend($mainInitiative->id);
        $initiativesSameCategory = Initiative::with('english', 'french', 'firstImage', 'subWhatCategory')->whereNotIn('id', $removeIDs)->where('who_category_id', $mainInitiative->who_category_id)->where('online', '1')->inRandomOrder()->limit(4)->get();
        foreach ($initiativesSameCategory as $initiative) if (is_null($initiative->firstImage)) $initiative->firstImage = collect(['path' => InitiativeImageRehabilitation::where('initiative_id', $initiative->id)->first()->path_1]);
        $testimonies = Testimony::with('english', 'french')->where('initiative_id', $id)->where('french_translation', '1')->get();
        $relatedPosts = array_merge($initiativesSameCategory, $initiativesSameType);
//        return view('new.public.initiative', [
//            'mainInitiative' => $mainInitiative,
//            'images' => $images,
//            'subWhatCategory' => $subWhatCategory,
//            'imagesRehabilitation' => [],
//            'initiativePath' => $initiativePath,
//            'initiativesSameType' => $initiativesSameType,
//            'initiativesSameCategory' => $initiativesSameCategory,
//            'testimonies' => $testimonies,
//            'relatedPosts' => $relatedPosts,
//            'stories' => []
//        ]);
        return ['relatedPosts' => $relatedPosts, 'edition' => $edition,];
    }

    public function oneTypeOfproject($type)
    {
        $edition = Edition::all()->select('id')->last();
        $subWhatCategory = SubWhatCategory::whereRaw('replace(lower(name)," ","-") LIKE "' . $type . '"')->first();
        if (is_null($subWhatCategory)) return view('new.errors.404', ['edition' => $edition]);
        $initiatives = Initiative::with('english', 'french', 'ImagesRandom')->where('sub_what_category_id', $subWhatCategory->id)->where('online', '1')->orderBy('id', 'desc')->get();
        $whatCategory = WhatCategory::where('id', $subWhatCategory->what_category_id)->with('subCategory')->first();
        return view('public.initiatives', ['initiatives' => $initiatives, 'subWhatCategory' => $subWhatCategory, 'whatCategory' => $whatCategory,]);
    }

    public function homeworkRoom()
    {
        $initiatives = Initiative::with('english', 'french', 'ImagesRandom')->where('what_category_id', 6)//Homework Room
        ->where('online', '1')->orderBy('id', 'desc')->get();

        $testemonies = Success::with('english', 'french')->where('what_category_id', '6')//Homework Room
        ->where('who_category_id', '4')//Children
        ->where('online', '1')->orderBy('id', 'desc')->limit(3)->get();

        $whatCategory = WhatCategory::where('id', $initiatives[0]->what_category_id)->with('subCategory')->first();

        return view('public.homework-room', ['initiatives' => $initiatives, 'testemonies' => $testemonies, 'whatCategory' => $whatCategory,]);
    }

    public function childrenUni(Request $request)
    {
        $pageName = 'children_uni';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $edition = Edition::all()->select('id')->last();
        $brief = HopeProjects::with('media')
            ->where('what_category_id', 17)
            ->first();
        $partners_ongoing = ProjectDonor::where('what_category_id',17)->with('donors')->where('isActive',1)->orderBy('rank','asc')->get();
        $partners_previous = ProjectDonor::where('what_category_id',17)->with('donors')->where('isActive',0)->orderBy('rank','asc')->get();
        $agent = new Agent();
        $carouselImages = Cover::where('what_category_id',17)->orderBy('image_order', 'asc')->select('image_path')->get();

        if (session('locale') == 'fr') {
            $language = 'french';
            $languageTable = 'initiatives_french';
        } else {
            $language = 'english';
            $languageTable = 'initiatives_english';
        }

        $searchCU = $this->search_list_cu_activities($languageTable);
        $searchStr = strtolower(addslashes($request->input('search')));
        $cuActivitiesIDs = $this->get_cuactivities_IDs($searchStr, $languageTable);

        if ($searchStr != '') {

            $ini_A = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->whereIn('initiatives.id', Arr::pluck($cuActivitiesIDs, 'id'))->where('what_category_id', 17)//Children
            ->where('online', '1')->where('place_id', '3')//aleppo
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_A');

            $ini_H = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->whereIn('initiatives.id', Arr::pluck($cuActivitiesIDs, 'id'))->where('what_category_id', 17)//Children
            ->where('online', '1')->where('place_id', '1')//homs
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_H');

        } else {

            $ini_A = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('what_category_id', 17)//Children
            ->where('online', '1')->where('place_id', '3')//aleppo
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_A');

            $ini_H = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('what_category_id', 17)//Children
            ->where('online', '1')->where('place_id', '1')//homs
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_H');
        }

        $initiatives = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('what_category_id', 17)//Children
        ->where('online', '1')->orderBy('id', 'desc')->get();

        $whatCategory = WhatCategory::where('id', $initiatives[0]->what_category_id)->with('subCategory')->first();

        return view('new.public.children-uni', ['partners_previous'=>$partners_previous,'partners_ongoing'=>$partners_ongoing,'brief'=> $brief,'carouselImages'=>$carouselImages,'edition' => $edition, 'initiatives' => $initiatives, 'ini_A' => $ini_A, 'ini_H' => $ini_H, 'whatCategory' => $whatCategory, 'agent' => $agent, 'search' => $searchStr, 'searchProject' => $searchCU]);
    }
    public function leap(Request $request)
    {
        $pageName = 'leap';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $edition = Edition::all()->select('id')->last();
        $brief = HopeProjects::with('media')
            ->where('what_category_id', 19)
            ->first();
        $partners_ongoing = ProjectDonor::where('what_category_id',19)->with('donors')->where('isActive',1)->orderBy('rank','asc')->get();
        $partners_previous = ProjectDonor::where('what_category_id',19)->with('donors')->where('isActive',0)->orderBy('rank','asc')->get();
        $agent = new Agent();
        $carouselImages = Cover::where('what_category_id',19)->orderBy('image_order', 'asc')->select('image_path')->get();

        if (session('locale') == 'fr') {
            $language = 'french';
            $languageTable = 'initiatives_french';
        } else {
            $language = 'english';
            $languageTable = 'initiatives_english';
        }

        $searchLEAP = $this->search_list_leap_activities($languageTable);
        $searchStr = strtolower(addslashes($request->input('search')));
        $leapActivitiesIDs = $this->get_leapactivities_IDs($searchStr, $languageTable);

        if ($searchStr != '') {

            $ini_A = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->whereIn('initiatives.id', Arr::pluck($leapActivitiesIDs, 'id'))->where('what_category_id', 19)//LEAP
            ->where('online', '1')->where('place_id', '3')//aleppo
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_A');

            $ini_H = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->whereIn('initiatives.id', Arr::pluck($leapActivitiesIDs, 'id'))->where('what_category_id', 19)//LEAP
            ->where('online', '1')->where('place_id', '1')//homs
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_H');

        } else {

            $ini_A = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('what_category_id', 19)//LEAP
            ->where('online', '1')->where('place_id', '3')//aleppo
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_A');

            $ini_H = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('what_category_id', 19)//LEAP
            ->where('online', '1')->where('place_id', '1')//homs
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_H');
        }

        $initiatives = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('what_category_id', 19)//LEAP
        ->where('online', '1')->orderBy('id', 'desc')->get();

        if(count($initiatives)>0){
            $whatCategory = WhatCategory::where('id', $initiatives[0]->what_category_id)->with('subCategory')->first();
        }
        else $whatCategory=[];

        return view('new.public.leap', ['partners_previous'=>$partners_previous,'partners_ongoing'=>$partners_ongoing,'brief'=> $brief,'carouselImages'=>$carouselImages,'edition' => $edition, 'initiatives' => $initiatives, 'ini_A' => $ini_A, 'ini_H' => $ini_H, 'whatCategory' => $whatCategory, 'agent' => $agent, 'search' => $searchStr, 'searchProject' => $searchLEAP]);
    }

    public function about_us()
    {
        $pageName = 'who_we_are';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!Session::has($sessionKey)) {
            $pageTracker->increment('views');
            Session::put($sessionKey, true);
        }

        $edition = Edition::all()->select('id')->last();
        $agent = new Agent();
        $carouselImages = Cover::where('what_category_id', 20)->orderBy('image_order', 'asc')->select('image_path')->get();
        $values = DB::table('hope_values')->get();

        $donors = $this->getSortedDonors([9, 10, 19], false);

        return view('new.public.who-we-are', [
            'carouselImages' => $carouselImages,
            'edition' => $edition,
            'values' => $values,
            'donors' => $donors,
            'agent' => $agent
        ]);
    }

    private function getSortedDonors($excludeIds = [9, 10, 19], $isMicro = false)
    {
        $query = \App\Donor::query();

        if ($isMicro) {
            $query->where('is_micro', '1');
        }

        return $query->whereNotIn('id', $excludeIds)
            ->orderBy('rank', 'asc')
            ->get();
    }

    public function about()
    {
        $profilesHope = DB::table('profile')->where('inactive', '0')->where('belong_to', 'hope')->orderBy('rank')->get();
        $profilesHope_Homs = DB::table('profile')->where('inactive', '0')->where('belong_to', 'hope_h')->orderBy('rank')->get();

        $profilesHoms = DB::table('profile')->where('inactive', '0')->where('belong_to', 'homs')->orWhere('belong_to', 'study')->orWhere('belong_to', 'disc')->orderBy('rank')->get();

        return view('public.about', ['profilesHope' => $profilesHope, 'profilesHoms' => $profilesHoms, 'profilesHope_Homs' => $profilesHope_Homs,]);
    }

    public function contact()
    {
        return view('public.contact', []);
    }

    public function our_team()
    {
        $edition = Edition::all()->select('id')->last();
        $profilesHope = DB::table('profile')->where('inactive', '0')->where('belong_to', 'hope')->orderBy('rank')->get();

        $profilesHope_Homs = DB::table('profile')->where('inactive', '0')->where('belong_to', 'hope_h')->orderBy('rank')->get();

        $profilesHope_Damascus = DB::table('profile')->where('inactive', '0')->where('belong_to', 'hope_d')->orderBy('rank')->get();
        $profilesHope_Latakia = DB::table('profile')->where('inactive', '0')->where('belong_to', 'hope_l')->orderBy('rank')->get();

        $profiles_disc = DB::table('profile')->where('inactive', '0')->whereIn('belong_to', ['disc'])->orderBy('rank')->get();

        $profiles_study = DB::table('profile')->where('inactive', '0')->whereIn('belong_to', ['study'])->orderBy('rank')->get();

        $profiles_children = DB::table('profile')->where('inactive', '0')->whereIn('belong_to', ['children'])->orderBy('rank')->get();

        $profiles_leap = DB::table('profile')->where('inactive', '0')->whereIn('belong_to', ['leap'])->orderBy('rank')->get();

        return view('new.public.team-private', ['edition' => $edition, 'profilesHope' => $profilesHope, 'profilesHope_Homs' => $profilesHope_Homs, 'profilesHope_Damascus' => $profilesHope_Damascus, 'profilesHope_Latakia' => $profilesHope_Latakia, 'profiles_disc' => $profiles_disc, 'profiles_study' => $profiles_study, 'profiles_children' => $profiles_children, 'profiles_leap' => $profiles_leap]);
    }

    public function christian_youth()
    {
        $pageName = 'christian_youth';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $edition = Edition::all()->select('id')->last();
        $agent = new Agent();
        $carouselImages = Cover::where('what_category_id',15)->orderBy('image_order', 'asc')->select('image_path')->get();

        return view('new.public.youth', [
            'carouselImages'=>$carouselImages,
            'edition' => $edition,
            'agent' => $agent
        ]);
    }

    public function christian_youth_member($id)
    {
        $edition = Edition::all()->select('id')->last();
        $link = strtolower($id);
        $profile = YouthProfile::where('link', $link)->first();
        if (is_null($profile)) {
            return redirect('/home');
        }
        return view('new.public.youth-member', ['edition' => $edition,])->with('profile', $profile);
    }

    public function show_team($id)
    {
        $edition = Edition::all()->select('id')->last();
        $profile = DB::table('profile')->where('belong_to', 'hope')->where('email', $id)->first();
        if (is_null($profile)) {
            $profile = DB::table('profile')->where('belong_to', 'homs')->where('email', $id)->first();
            if (is_null($profile)) {
                return redirect('/home');
            }
        }
        return view('new.public.team', ['edition' => $edition,])->with('profile', $profile);
    }

    public function show_homs_hope_team($id)
    {
        $edition = Edition::all()->select('id')->last();
        $member = DB::table('profile')->where('belong_to', 'hope_h')->where('email', $id)->get();
        if (count($member) == 0) {
            return redirect('/home');
        } else {
            return view('new.public.team', ['edition' => $edition,])->with('profile', $member[0]);
        }
    }

    public function show_damascus_hope_team($id)
    {
        $edition = Edition::all()->select('id')->last();
        $member = DB::table('profile')->where('belong_to', 'hope_d')->where('email', $id)->get();
        if (count($member) == 0) {
            return redirect('/home');
        } else {
            return view('new.public.team', ['edition' => $edition,])->with('profile', $member[0]);
        }
    }
    public function show_latakia_hope_team($id)
    {
        $edition = Edition::all()->select('id')->last();
        $member = DB::table('profile')->where('belong_to', 'hope_l')->where('email', $id)->get();
        if (count($member) == 0) {
            return redirect('/home');
        } else {
            return view('new.public.team', ['edition' => $edition,])->with('profile', $member[0]);
        }
    }
    public function studyzone_team($id)
    {
        $edition = Edition::all()->select('id')->last();
        $member = DB::table('profile')->where('belong_to', 'study')->where('email', $id)->get();
        if (count($member) == 0) {
            return redirect('/home');
        } else {
            return view('new.public.team', ['edition' => $edition,])->with('profile', $member[0]);
        }
    }

    public function disc_team($id)
    {
        $member = DB::table('profile')->where('belong_to', 'disc')->where('email', $id)->get();
        $edition = Edition::all()->select('id')->last();
        if (count($member) == 0) {
            return redirect('/home');
        } else {
            return view('new.public.team', ['edition' => $edition,])->with('profile', $member[0]);
        }
    }

    public function children_team($id)
    {
        $edition = Edition::all()->select('id')->last();
        $member = DB::table('profile')->where('belong_to', 'children')->where('email', $id)->get();

        if (count($member) == 0) {
            return redirect('/home');
        } else {
            return view('new.public.team', ['edition' => $edition,])->with('profile', $member[0]);
        }
    }

    public function leap_team($id)
    {
        $edition = Edition::all()->select('id')->last();
        $member = DB::table('profile')->where('belong_to', 'leap')->where('email', $id)->get();

        if (count($member) == 0) {
            return redirect('/home');
        } else {
            return view('new.public.team', ['edition' => $edition,])->with('profile', $member[0]);
        }
    }

    public function family_to_family()
    {
        $pageName = 'family_to_family';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $edition = Edition::all()->select('id')->last();
        $brief = HopeProjects::with('media')
            ->where('what_category_id', 8)
            ->first();
        $partners_ongoing = ProjectDonor::where('what_category_id',8)->with('donors')->where('isActive',1)->orderBy('rank','asc')->get();
        $partners_previous = ProjectDonor::where('what_category_id',8)->with('donors')->where('isActive',0)->orderBy('rank','asc')->get();

        $agent = new Agent();
        $carouselImages = Cover::where('what_category_id',8)->orderBy('image_order', 'asc')->select('image_path')->get();
        $familyMap = DB::select('select * from familypartners');
        $partners = Initiative::with('english', 'french', 'ImagesRandom')->join('initiatives_english', 'initiatives.id', 'initiative_id')->where('sub_what_category_id', 1)->where('online', '1')->orderBy('rank')->get();

        return view('new.public.family-to-family', ['partners_previous'=>$partners_previous,'partners_ongoing'=>$partners_ongoing,'carouselImages'=>$carouselImages,'edition' => $edition, 'partners' => $partners, 'brief' => $brief, 'familyMap' => $familyMap, 'agent' => $agent]);
    }
//    public function show_donate()
//    {
//        return view('public.donate')->with('mpCount', 0);
//    }
//    public function show_donate_project($id)
//    {
//        if (session('locale') == 'fr') {
//            $language = 'french';
//        } else {
//            $language = 'english';
//        }
//        $microProject = Project::with($language)->where([['MicroProject_ID', $id], ['MPE_Done', '0'], ['MPE_Published', '1']])->get();
//        foreach ($microProject as $mp) {
//            $mp->lang = $mp->$language;
//        }
//        if (count($microProject) == 0) {
//            return view('errors.404');
//        } else {
//            return view('public.donate')->with('microProject', $microProject)->with('mpCount', 1);
//        }
//    }
    public function studyzone(Request $request)
    {
        $pageName = 'study_zone';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $edition = Edition::all()->select('id')->last();
        $brief = HopeProjects::with('media')
            ->where('what_category_id', 7)
            ->first();
        $partners_ongoing = ProjectDonor::where('what_category_id',7)->with('donors')->where('isActive',1)->orderBy('rank','asc')->get();
        $partners_previous = ProjectDonor::where('what_category_id',7)->with('donors')->where('isActive',0)->orderBy('rank','asc')->get();
        $all_students = Student::count();

        $agent = new Agent();
        $carouselImages = Cover::where('what_category_id',7)->orderBy('image_order', 'asc')->select('image_path')->get();
        $testemonies = Success::with('english', 'french')->where('what_category_id', '7')//Study
        ->where('online', '1')->orderBy('id', 'desc')->limit(4)->get();

        $studyzone_centers = DB::select('select places.name as "placename", SUBSTRING_INDEX(studyzonecenters.name,\'-\',-1) as name ,studyzonecenters.id, studyzonecenters.name_fr , work_hours , address,location,telephone,email,facebook,instagram,latitude,longtitude,studyzonecenters.rank,place_id,active
        FROM `studyzonecenters` LEFT  JOIN  places on places.id = studyzonecenters.place_id order by placename, studyzonecenters.name asc ;');

        $studyzone_centers_a = DB::select('select SUBSTRING_INDEX(name,\'-\',-1) as name ,id, name_fr ,active, start_date, work_hours , address,location,telephone,email,facebook,instagram,latitude,longtitude,studyzonecenters.rank,place_id,active
        FROM `studyzonecenters` WHERE place_id = 3 ORDER BY studyzonecenters.rank;');

        $studyzone_centers_h = DB::select('select SUBSTRING_INDEX(name,\'-\',-1) as name ,id, name_fr ,active, start_date, work_hours , address,location,telephone,email,facebook,instagram,latitude,longtitude,studyzonecenters.rank,place_id,active
        FROM `studyzonecenters` WHERE place_id = 1 ORDER BY studyzonecenters.rank;');

        $studyzone_centers_d = DB::select('select SUBSTRING_INDEX(name,\'-\',-1) as name ,id, name_fr ,active, start_date, work_hours , address,location,telephone,email,facebook,instagram,latitude,longtitude,studyzonecenters.rank,place_id,active
        FROM `studyzonecenters` WHERE place_id = 2 ORDER BY studyzonecenters.rank;');

        $studyzone_centers_l = DB::select('select SUBSTRING_INDEX(name,\'-\',-1) as name ,id, name_fr ,active, start_date, work_hours , address,location,telephone,email,facebook,instagram,latitude,longtitude,studyzonecenters.rank,place_id,active
        FROM `studyzonecenters` WHERE place_id = 4 ORDER BY studyzonecenters.rank;');

        $studyzone_centers_t = DB::select('select SUBSTRING_INDEX(name,\'-\',-1) as name ,id, name_fr ,active, start_date, work_hours , address,location,telephone,email,facebook,instagram,latitude,longtitude,studyzonecenters.rank,place_id,active
        FROM `studyzonecenters` WHERE place_id = 6 ORDER BY studyzonecenters.rank;');

        $student_count = DB::connection('mysql_second')->select('SELECT
    hcsz_cities.code as name,
    COALESCE(COUNT(hcsz_student_entries.id), 0) AS student_count
FROM
    hcsz_cities
    LEFT JOIN hcsz_centers ON hcsz_cities.id = hcsz_centers.city_id
    LEFT JOIN hcsz_student_entries ON hcsz_centers.id = hcsz_student_entries.center_id
    AND hcsz_student_entries.entry_time >= DATE_FORMAT(DATE_SUB(CURRENT_DATE, INTERVAL 2 MONTH), "%Y-%m-01")
       AND hcsz_student_entries.entry_time < DATE_ADD(LAST_DAY(CURRENT_DATE), INTERVAL 1 DAY)
WHERE
  hcsz_cities.id NOT IN (0,7,5)
GROUP BY
    hcsz_cities.code;');

        $education_fields = DB::connection('mysql_second')->select('SELECT
    JSON_UNQUOTE(JSON_EXTRACT(hcsz_educations.name, \'$.en\')) as name,
    COUNT(hcsz_students.id) AS students_count
FROM
    hcsz_students
    LEFT JOIN hcsz_student_entries ON hcsz_students.id = hcsz_student_entries.student_id
    LEFT JOIN hcsz_centers ON hcsz_student_entries.center_id = hcsz_centers.id
    LEFT JOIN hcsz_cities ON hcsz_centers.city_id = hcsz_cities.id
    LEFT JOIN hcsz_student_educations on hcsz_student_educations.student_id = hcsz_students.id
    LEFT JOIN hcsz_educations on hcsz_educations.id = hcsz_student_educations.education_id
WHERE
       hcsz_student_entries.entry_time >= DATE_FORMAT(DATE_SUB(CURRENT_DATE, INTERVAL 2 MONTH), "%Y-%m-01")
       AND hcsz_student_entries.entry_time < DATE_ADD(LAST_DAY(CURRENT_DATE), INTERVAL 1 DAY)
GROUP BY hcsz_educations.name
HAVING hcsz_educations.name is not null
ORDER BY `students_count` DESC  LIMIT 5');

        $gender_percentage = DB::connection('mysql_second')->select('SELECT
    CASE
        WHEN hcsz_students.gender = 1 THEN \'Male\'
        WHEN hcsz_students.gender = 2 THEN \'Female\' END,
    COUNT(hcsz_students.id) AS student_count
   , ROUND(COUNT(hcsz_students.id) / total.total_count * 100, 2) AS percentage
FROM
    hcsz_students
    LEFT JOIN hcsz_student_entries ON hcsz_students.id = hcsz_student_entries.student_id
    LEFT JOIN hcsz_centers ON hcsz_student_entries.center_id = hcsz_centers.id
    LEFT JOIN hcsz_cities ON hcsz_centers.city_id = hcsz_cities.id
    LEFT JOIN (
       SELECT COUNT(hcsz_students.id) AS total_count
       FROM hcsz_students
       LEFT JOIN hcsz_student_entries ON hcsz_students.id = hcsz_student_entries.student_id
       WHERE hcsz_student_entries.entry_time >= DATE_FORMAT(DATE_SUB(CURRENT_DATE, INTERVAL 2 MONTH), "%Y-%m-01")
       AND hcsz_student_entries.entry_time < DATE_ADD(LAST_DAY(CURRENT_DATE), INTERVAL 1 DAY)
       and hcsz_students.gender IS NOT null and hcsz_students.gender <> 0
   ) AS total ON 1=1
WHERE
     hcsz_student_entries.entry_time >= DATE_FORMAT(DATE_SUB(CURRENT_DATE, INTERVAL 2 MONTH), "%Y-%m-01")
       AND hcsz_student_entries.entry_time < DATE_ADD(LAST_DAY(CURRENT_DATE), INTERVAL 1 DAY)
AND hcsz_students.gender IS NOT null and hcsz_students.gender <> 0
GROUP BY    hcsz_students.gender ,total_count
HAVING  hcsz_students.gender is not null
ORDER BY `student_count` DESC');

        if (session('locale') == 'fr') {
            $language = 'french';
            $languageTable = 'initiatives_french';
        } else {
            $language = 'english';
            $languageTable = 'initiatives_english';
        }
        $searchST = $this->search_list_SZ_activities($languageTable);
        $searchStr = strtolower(addslashes($request->input('search')));
        $szActivitiesIDs = $this->get_szactivities_IDs($searchStr, $languageTable);

        if ($searchStr != '') {
            $ini_A = Initiative::with('english', 'french', 'firstImage', 'images', 'place', 'center')->where('what_category_id', '7')->where('sub_what_category_id', '12')->whereIn('initiatives.id', Arr::pluck($szActivitiesIDs, 'id'))->where('online', '1')->where('place_id', '3')//aleppo
            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'ini_A');

            $ini_H = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '12')->whereIn('initiatives.id', Arr::pluck($szActivitiesIDs, 'id'))->where('what_category_id', '7')->where('online', '1')->whereIn('place_id', [1, 5])->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_H');
            $ini_D = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '12')->whereIn('initiatives.id', Arr::pluck($szActivitiesIDs, 'id'))->where('what_category_id', '7')->where('online', '1')->where('place_id', '2')//Damascus
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_D');
            $ini_L = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '12')->whereIn('initiatives.id', Arr::pluck($szActivitiesIDs, 'id'))->where('what_category_id', '7')->where('online', '1')->where('place_id', '4')//Latakia
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_L');
            $ini_T = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '12')->whereIn('initiatives.id', Arr::pluck($szActivitiesIDs, 'id'))->where('what_category_id', '7')->where('online', '1')->where('place_id', '6')//Tartus
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_T');
        } else {
            $ini_A = Initiative::with('english', 'french', 'firstImage', 'images', 'place', 'center')->where('what_category_id', '7')->where('sub_what_category_id', '12')->where('online', '1')->where('place_id', '3')//aleppo
            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'ini_A');

            $ini_H = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '12')->where('what_category_id', '7')->where('online', '1')->whereIn('place_id', [1, 5])//homs + countryside
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_H');
            $ini_D = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '12')->where('what_category_id', '7')->where('online', '1')->where('place_id', '2')//Damascus
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_D');
            $ini_L = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '12')->where('what_category_id', '7')->where('online', '1')->where('place_id', '4')//Latakia
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_L');
            $ini_T = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '12')->where('what_category_id', '7')->where('online', '1')->where('place_id', '6')//Tartus
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_T');

        }
        $initiatives = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('what_category_id', 7)->where('online', '1')->orderBy('id', 'desc')->get();
        $whatCategory = WhatCategory::where('id', $initiatives[0]->what_category_id)->with('subCategory')->first();

        return view('new.public.study-zone', ['partners_ongoing'=>$partners_ongoing,'partners_previous'=>$partners_previous,'brief'=>$brief,'carouselImages'=>$carouselImages,'all_students' => $all_students, 'edition' => $edition, 'testemonies' => $testemonies, 'studyzone_centers' => $studyzone_centers, 'studyzone_centers_a' => $studyzone_centers_a, 'studyzone_centers_h' => $studyzone_centers_h, 'studyzone_centers_d' => $studyzone_centers_d, 'studyzone_centers_l' => $studyzone_centers_l, 'studyzone_centers_t' => $studyzone_centers_t, 'agent' => $agent, 'ini_A' => $ini_A, 'ini_H' => $ini_H, 'ini_D' => $ini_D, 'ini_L' => $ini_L, 'ini_T' => $ini_T, 'whatCategory' => $whatCategory, 'searchProject' => $searchST, 'student_count' => $student_count, 'education_fields' => $education_fields, 'gender_percentage' => $gender_percentage]);
    }
    public function studyzone_all(Request $request)
    {
        if (session('locale') == 'fr') {
            $language = 'french';
            $languageTable = 'initiatives_french';
        } else {
            $language = 'english';
            $languageTable = 'initiatives_english';
        }
        $searchStr = strtolower(addslashes($request->input('search')));
        $EventsIDs = $this->get_initiatives_IDs($searchStr, $languageTable);
        $StudyIDs = $this->get_initiatives_IDs($searchStr, $languageTable);

        if ($searchStr != '') {
            $Events = Initiative::with('english', 'french', 'firstImage', 'images', 'place', 'center')->where('what_category_id', '7')->where('sub_what_category_id', '12')->whereIn('initiatives.id', Arr::pluck($EventsIDs, 'id'))->where('online', '1')->orderBy('created_at', 'desc')->paginate(12, ['*'], 'Events');

            $Study = Initiative::with('english', 'french', 'firstImage', 'images', 'place', 'center')->where('what_category_id', '7')->where('sub_what_category_id', '13')->whereIn('initiatives.id', Arr::pluck($StudyIDs, 'id'))->where('online', '1')->orderBy('created_at', 'desc')->paginate(12, ['*'], 'Study');
        } else {
            $Events = Initiative::with('english', 'french', 'firstImage', 'images', 'place', 'center')->where('what_category_id', '7')->where('sub_what_category_id', '12')->where('online', '1')->orderBy('created_at', 'desc')->paginate(12, ['*'], 'Events');

            $Study = Initiative::with('english', 'french', 'firstImage', 'images', 'place', 'center')->where('what_category_id', '7')->where('sub_what_category_id', '13')->where('online', '1')->orderBy('created_at', 'desc')->paginate(12, ['*'], 'Study');
        }
        foreach ($Events as $mp) {
            $mp->lang = $mp->$language;
        }
        foreach ($Study as $mp) {
            $mp->lang = $mp->$language;
        }
        $searchEvent = $this->search_list_initiatives($languageTable);
        $EventCopy = $this->get_event_copy($request->input('event'), $language);
        $StudyCopy = $this->get_study_copy($request->input('study'), $language);


        return view('public.study-inner', ['Events' => $Events, 'Study' => $Study, 'search' => $searchStr, 'searchEvent' => $searchEvent, 'EventCopy' => $EventCopy, 'StudyCopy' => $StudyCopy,]);
    }

    public function disc(Request $request)
    {
        $pageName = 'disc';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = \App\Models\PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!\Illuminate\Support\Facades\Session::has($sessionKey)) {
            $pageTracker->increment('views');
            \Illuminate\Support\Facades\Session::put($sessionKey, true);
        }

        $edition = Edition::all()->select('id')->last();
        $agent = new Agent();
        $carouselImages = Cover::where('what_category_id',5)->orderBy('image_order', 'asc')->select('image_path')->get();
        $brief = HopeProjects::with('media')
            ->where('what_category_id', 5)
            ->first();
        $partners_ongoing = ProjectDonor::where('what_category_id',5)->with('donors')->where('isActive',1)->orderBy('rank','asc')->get();
        $partners_previous = ProjectDonor::where('what_category_id',5)->with('donors')->where('isActive',0)->orderBy('rank','asc')->get();

        $testemonies = Success::with('english', 'french')->where('Sub_what_category_id', 16)//Job Opportunities
        ->where('what_category_id', '5')//DISC
        ->where('online', '1')->orderBy('id', 'desc')->limit(4)->get();

        if (session('locale') == 'fr') {
            $language = 'french';
            $languageTable = 'initiatives_french';
        } else {
            $language = 'english';
            $languageTable = 'initiatives_english';
        }

        $searchST = $this->search_list_DISC_activities($languageTable);
        $searchStr = strtolower(addslashes($request->input('search')));
        $discActivitiesIDs = $this->get_discactivities_IDs($searchStr, $languageTable);

        if ($searchStr != '') {
            $ini_A = Initiative::with('english', 'french', 'firstImage', 'images', 'place', 'center')->where('what_category_id', '5')->where('sub_what_category_id', '8')->whereIn('initiatives.id', Arr::pluck($discActivitiesIDs, 'id'))->where('online', '1')->where('place_id', '3')//aleppo
            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'ini_A');

            $ini_H = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '8')->whereIn('initiatives.id', Arr::pluck($discActivitiesIDs, 'id'))->where('what_category_id', '5')->where('online', '1')->where('place_id', '1')//homs
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_H');

            $ini_D = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '8')->whereIn('initiatives.id', Arr::pluck($discActivitiesIDs, 'id'))->where('what_category_id', '5')->where('online', '1')->where('place_id', '2')//Damascus
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_D');

        } else {
            $ini_A = Initiative::with('english', 'french', 'firstImage', 'images', 'place', 'center')->where('what_category_id', '5')->where('sub_what_category_id', '8')->where('online', '1')->where('place_id', '3')//aleppo
            ->orderBy('created_at', 'desc')->paginate(5, ['*'], 'ini_A');

            $ini_H = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '8')->where('what_category_id', '5')->where('online', '1')->where('place_id', '1')//homs
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_H');

            $ini_D = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('sub_what_category_id', '8')->where('what_category_id', '5')->where('online', '1')->where('place_id', '2')//Damascus
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'ini_D');
        }

        $initiatives = Initiative::with('english', 'french', 'ImagesRandom', 'donors')->where('what_category_id', 5)->where('online', '1')->orderBy('id', 'desc')->get();

        $whatCategory = WhatCategory::where('id', $initiatives[0]->what_category_id)->with('subCategory')->first();

        $statistics = DB::select('CALL get_statistics()');

        if (empty($statistics)) {
            $statistics = null;
        }

        return view('new.public.disc', ['partners_previous'=> $partners_previous ,'partners_ongoing'=> $partners_ongoing,'brief'=> $brief,'carouselImages'=>$carouselImages,'statistics' => $statistics, 'testemonies' => $testemonies, 'agent' => $agent, 'ini_A' => $ini_A, 'ini_H' => $ini_H, 'ini_D' => $ini_D, 'whatCategory' => $whatCategory, 'edition' => $edition, 'searchProject' => $searchST]);
    }
    public function discByPlace($place)
    {
        $edition = Edition::all()->select('id')->last();
        $place = Place::whereRaw('replace(lower(name)," ","-") LIKE "' . $place . '"')->first();
        if (is_null($place)) return view('new.errors.404', ['edition' => $edition]);

        $successes = Success::with('english', 'french')->where('place_id', $place->id)->where('Sub_what_category_id', 17)//Student Of Month
        ->where('what_category_id', '5')//DISC
        ->where('online', '1')->orderBy('id', 'desc')->limit(6)->get();

        $initiatives = Initiative::with('english', 'french', 'images', 'courses')->where('place_id', $place->id)->where('what_category_id', 5)//DISC
        ->where('online', '1')->first();


        return view('public.disc-inner', ['initiatives' => $initiatives, 'successes' => $successes,]);
    }
    public function newsletter()
    {
        $pageName = 'our-news';
        $sessionKey = 'has_viewed_' . $pageName;

        $pageTracker = PageView::firstOrCreate(
            ['page_name' => $pageName],
            ['views' => 0]
        );

        if (!Session::has($sessionKey)) {
            $pageTracker->increment('views');
            Session::put($sessionKey, true);
        }

        $agent = new \Jenssegers\Agent\Agent();
        $carouselImages = \App\Models\Cover::where('what_category_id', 40)
            ->orderBy('image_order', 'asc')
            ->get();

        return view('new.public.newsletter', [
            'agent' => $agent,
            'carouselImages' => $carouselImages,
            'pageViews' => $pageTracker->views
        ]);
    }

    public function subscribe(Request $request)
    {
        if (Request()->ajax()) {
            $data = $request->input('email');
            $email = Subscribers::where('mail', $data)->get();
            if ($email->count()) {
                return response()->json(array('msg' => 'true'));
            } else {
                $subscriber = new Subscribers();
                $subscriber->mail = $data;
                $subscriber->token = str_random(50);
                $subscriber->save();
                Mail::to($subscriber->mail)->send(new UserSubscribedEmail());
                return response()->json(array('msg' => 'false'));
            }
        }
    }


//    public function fillDropdownEdition()
//    {
//        if (Request()->ajax()) {
//            $fillDropdownItems = [];
//            $arr1 = [];
//            $editions = Edition::select('name')->where('online', 1)->get();
//            foreach ($editions as $edition) {
//                array_push($arr1, $edition->name);
//            }
//            $this->$fillDropdownItems = $arr1;
//            return response()->json(array('msg' => $this->$fillDropdownItems));
//        }
//    }
//
//    public function fillDropdownWho()
//    {
//        if (Request()->ajax()) {
//            $arr3 = [];
//            $whoCategories = WhoCategory::select('name')->get();
//            foreach ($whoCategories as $whoCategory) {
//                array_push($arr3, $whoCategory->name);
//            }
//            $fillDropdownItems = $arr3;
//            return response()->json(array('msg' => $fillDropdownItems));
//        }
//    }
//
//    public function fillDropdownWhat()
//    {
//        $arr2 = [];
//        $whatCategories = WhatCategory::select('name')->whereIn('id', [11, 12, 13, 14, 15])->get();
//        foreach ($whatCategories as $whatCategory) {
//            array_push($arr2, $whatCategory->name);
//        }
//        $fillDropdownItems = $arr2;
//        return response()->json(array('msg' => $fillDropdownItems));
//    }

    public function show_article($id, $city, $date)
    {
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $article = NEWS::with('english', 'french', 'images')
            ->where('id', $id)
            ->where('online', '1')
            ->first();

        if (!isset($article)) {
            return view('new.errors.404');
        }

        $article->increment('total_views');

        $sessionKey = 'viewed_article_' . $article->id;

        if (!Session::has($sessionKey)) {
            $article->increment('view_count');
            Session::put($sessionKey, true);
        }

        $articlePath = $id . '-' . Str::slug(strtolower($city)) . '-' . $date;
        $images = NewsImage::where('news_id', $id)->get();

        return view('new.public.article', [
            'article'     => $article,
            'images'      => $images,
            'articlePath' => $articlePath
        ]);
    }
    public function hometest()
    {
        $fundedCount = Project::whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->count();

//        $newProjectsCount = Project::whereIn('projectsubtype_id', [4, 6])->whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->count(); //new
//        $expandrojectsCount = Project::whereIn('projectsubtype_id', [5, 7])->whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->count(); //expand

        $familyMembersCount = Project::whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->sum('FamilyMembers');

        $workLossCount = Project::where('WorkLoss', '1')->whereIn('MPE_Done', [1, 2])->whereIn('MPE_Published', [1, 2])->count(); //WorkLoss
        $workLossRatio = $workLossCount * 100 / $fundedCount;

//        $newRatio = $newProjectsCount * 100 / $fundedCount;
//        $expandRatio = $expandrojectsCount * 100 / $fundedCount;

//        $newRatio = number_format($newRatio, 2, '.', '');
//        $expandRatio = number_format($expandRatio, 2, '.', '');
//        $workLossRatio = number_format($workLossRatio, 2, '.', '');

        $lastEdition = Edition::latest()->first();

        return ['fundedCount' => $fundedCount, 'familyMembersCount' => $familyMembersCount, //            'newRatio' => $newRatio,
//            'expandRatio' => $expandRatio,
            'lastEdition' => $lastEdition, 'workLossRatio' => $workLossRatio, //            'newProjectsCount' => $newProjectsCount,
//            'expandrojectsCount' => $expandrojectsCount,
        ];
    }

    public function search(Request $request)
    {
        $edition = Edition::all()->select('id')->last();

        $search_str = $request->search;
        if ($search_str == null) {
            return redirect()->back();
        }
        $projects_data = Project::whereIn('MPE_Published', [1, 2])->with('english', 'donor', 'place')->WhereHas('english', function ($q) use ($search_str) {
            $q->where('MPE_Name', 'LIKE', "%{$search_str}%")->OrWhere('MPE_ExpSkill', 'LIKE', "%{$search_str}%")->OrWhere('MPE_Suffering', 'LIKE', "%{$search_str}%");
        })->orWhereHas('donor', function ($q) use ($search_str) {
            $q->where('name', 'LIKE', "%{$search_str}%");
        })->orWhereHas('place', function ($q) use ($search_str) {
            $q->where('name', 'LIKE', "%{$search_str}%");
        })->orWhere('MPE_BeneficiaryName', 'LIKE', "%{$search_str}%")->orWhere('MicroProject_ID', 'LIKE', "%{$search_str}%")->orderBy('id', 'desc')->get();

        foreach ($projects_data as $d) {
            $d->MPE_BeneficiaryName = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->MPE_BeneficiaryName);
            $d->english->MPE_Name = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->MPE_Name);
            $d->donor->name = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->donor->name);
            $d->place->name = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->place->name);
            $d->english->MPE_ExpSkill = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->MPE_ExpSkill);
            $d->english->MPE_Suffering = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->MPE_Suffering);
        }

        $initiatives_data = Initiative::with('english', 'donors', 'place', 'center', 'whatCategory', 'subWhatCategory', 'whoCategory', 'firstImage', 'ImagesRandom')->orWhereHas('english', function ($q) use ($search_str) {
            $q->where('title', 'LIKE', "%{$search_str}%")->OrWhere('content', 'LIKE', "%{$search_str}%")->OrWhere('description', 'LIKE', "%{$search_str}%")->OrWhere('organization', 'LIKE', "%{$search_str}%")->OrWhere('date_string', 'LIKE', "%{$search_str}%");
        })->orWhereHas('donors', function ($q) use ($search_str) {
            $q->where('name', 'LIKE', "%{$search_str}%");
        })->orWhereHas('center', function ($q) use ($search_str) {
            $q->where('name', 'LIKE', "%{$search_str}%");
        })->orWhereHas('place', function ($q) use ($search_str) {
            $q->where('name', 'LIKE', "%{$search_str}%");
        })->orderBy('id', 'desc')->get();

        foreach ($initiatives_data as $d) {
            $d->english->description = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->description);
            $d->english->title = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->title);
            $d->english->content = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->content);
            $d->english->organization = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->organization);
            $d->english->date_string = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->date_string);
            $d->place->name = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->place->name);
        }

        $news_data = News::with('english', 'edition', 'place', 'firstImage')->orWhereHas('english', function ($q) use ($search_str) {
            $q->where('title', 'LIKE', "%{$search_str}%")->OrWhere('content', 'LIKE', "%{$search_str}%")->OrWhere('description', 'LIKE', "%{$search_str}%");
        })->orWhereHas('edition', function ($q) use ($search_str) {
            $q->where('name', 'LIKE', "%{$search_str}%");
        })->orWhereHas('place', function ($q) use ($search_str) {
            $q->where('name', 'LIKE', "%{$search_str}%");
        })->orderBy('id', 'desc')->get();
        foreach ($news_data as $d) {
            $d->english->description = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->description);
            $d->edition->name = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->edition->name);
            $d->place->name = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->place->name);
            $d->english->title = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->title);
            $d->english->content = preg_replace("/($search_str)/i", '<span class="highlight">$1</span>', $d->english->content);
        }

        return view('new.public.search', compact(['projects_data', 'news_data', 'initiatives_data', 'edition']));
    }

    public function info_disc()
    {
        $info_disc = InfoDisc::orderBy('id')->get();
        return view('new.public.info-disc', compact('info_disc'));
    }
}
