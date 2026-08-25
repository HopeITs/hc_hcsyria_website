<?php

namespace App\Http\Controllers;

use App\Initiative;
use App\InitiativeFrench;
use App\Models\News;
use App\NewsFrench;
use App\Project;
use App\ProjectFrench;
use App\Success;
use App\SuccessFrench;
use App\TestimonyFrench;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {

        // DONE =    funded & canceled
        // Publish = online & hidden
        $user = User::with('roles', 'permissions', 'places')->where('id', Auth::id())->get()[0];
        $user_places = [];
        foreach ($user['places'] as $i) {
            array_push($user_places, $i->id);
        }

        $projectsAleppo = Project::where('MPE_City', '3')->whereIn('MPE_Published', [1, 2])->whereIn('MPE_Done', [1, 2])->count();
        $projectsHoms = Project::where('MPE_City', '1')->whereIn('MPE_Published', [1, 2])->whereIn('MPE_Done', [1, 2])->count();
        $projectsDamascus = Project::where('MPE_City', '2')->whereIn('MPE_Published', [1, 2])->whereIn('MPE_Done', [1, 2])->count();
        $projectsLatakia = Project::where('MPE_City', '4')->whereIn('MPE_Published', [1, 2])->whereIn('MPE_Done', [1, 2])->count();
        $projectsWadi = Project::where('MPE_City', '7')->whereIn('MPE_Published', [1, 2])->whereIn('MPE_Done', [1, 2])->count();
        $projectsIdleb = Project::where('MPE_City', '8')->whereIn('MPE_Published', [1, 2])->whereIn('MPE_Done', [1, 2])->count();
        $projectsTartus = Project::where('MPE_City', '6')->whereIn('MPE_Published', [1, 2])->whereIn('MPE_Done', [1, 2])->count();
        $projectsCanceled = Project::with('place')->where('MPE_Done', '2')->orderby('MicroProject_ID', 'asc')->get();

        // Publish = waiting to be published


        if ($user_places == null || $user_places[0] == 0) {
            //ADMIN

            $projectsPublish = Project::with('images', 'place')->pending()->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniSchoolPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '9')->pending()->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniChildrenPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '17')->pending()->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniDiscPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '5')->pending()->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniLeapPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '19')->pending()->where('english_check', '1')->orderby('id', 'desc')->get();

            $sucDiscPublish = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '5')->where('online', '0')->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniStudyPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '7')->pending()->where('english_check', '1')->orderby('id', 'desc')->get();

            $sucStudyPublish = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '0')->where('english_check', '1')->orderby('id', 'desc')->get();

            $initiativesPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->pending()->whereIn('what_category_id', [1, 3, 4, 8, 18])->where('english_check', '1')->orderby('id', 'desc')->get();

            $newsPublish = News::with('whatCategory', 'images')->pending()->where('english_check', '1')->orderby('id', 'desc')->get();
        }
        else {
            $projectsPublish = Project::with('images', 'place')->pending()->whereIn('MPE_City', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();
            $iniSchoolPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '9')->pending()->whereIn('place_id', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniChildrenPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '17')->pending()->whereIn('place_id', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniDiscPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '5')->pending()->whereIn('place_id', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniLeapPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '19')->pending()->whereIn('place_id', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();

            $sucDiscPublish = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '5')->where('online', '0')->whereIn('place_id', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();

            $iniStudyPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '7')->pending()->whereIn('place_id', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();

            $sucStudyPublish = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '0')->whereIn('place_id', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();

            $initiativesPublish = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->pending()->whereIn('what_category_id', [1, 3, 4, 8, 18])->whereIn('place_id', $user_places)->where('english_check', '1')->orderby('id', 'desc')->get();

            $newsPublish = News::with('whatCategory', 'images')->pending()->forPlacesIncludingNational($user_places)->where('english_check', '1')->orderby('id', 'desc')->get();
        }



        if ($user_places == null || $user_places[0] == 0) {
            //ADMIN
            $projectsEngCheck = Project::with('images', 'place')->pending()->where('english_check', '0')->orderby('id', 'desc')->get();
            $iniSchoolEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '9')->pending()->where('english_check', '0')->orderby('id', 'desc')->get();

            $iniChildrenEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '17')->pending()->where('english_check', '0')->orderby('id', 'desc')->get();

            $iniDiscEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '5')->pending()->where('english_check', '0')->orderby('id', 'desc')->get();

            $iniLeapEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '19')->pending()->where('english_check', '0')->orderby('id', 'desc')->get();

            $sucDiscEngCheck = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '5')->where('online', '0')->where('english_check', '0')->orderby('id', 'desc')->get();

            $iniStudyEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '7')->pending()->where('english_check', '0')->orderby('id', 'desc')->get();

            $sucStudyEngCheck = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '0')->where('english_check', '0')->orderby('id', 'desc')->get();

            $initiativesEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->pending()->whereIn('what_category_id', [1, 3, 4, 8, 18])->where('english_check', '0')->orderby('id', 'desc')->get();

            $newsEngCheck = News::with('whatCategory', 'images')->pending()->where('english_check', '0')->orderby('id', 'desc')->get();
        }
        else{
            $projectsEngCheck = Project::with('images', 'place')->whereIn('MPE_City', $user_places)->pending()->where('english_check', '0')->orderby('id', 'desc')->get();
            $iniSchoolEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '9')->pending()->whereIn('place_id', $user_places)->where('english_check', '0')->orderby('id', 'desc')->get();

            $iniChildrenEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '17')->pending()->whereIn('place_id', $user_places)->where('english_check', '0')->orderby('id', 'desc')->get();

            $iniDiscEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '5')->pending()->whereIn('place_id', $user_places)->where('english_check', '0')->orderby('id', 'desc')->get();

            $iniLeapEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '19')->pending()->whereIn('place_id', $user_places)->where('english_check', '0')->orderby('id', 'desc')->get();

            $sucDiscEngCheck = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '5')->where('online', '0')->whereIn('place_id', $user_places)->where('english_check', '0')->orderby('id', 'desc')->get();

            $iniStudyEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->where('what_category_id', '7')->pending()->whereIn('place_id', $user_places)->where('english_check', '0')->orderby('id', 'desc')->get();

            $sucStudyEngCheck = Success::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center')->where('what_category_id', '7')->where('online', '0')->whereIn('place_id', $user_places)->where('english_check', '0')->orderby('id', 'desc')->get();

            $initiativesEngCheck = Initiative::with('english', 'whatCategory', 'subWhatCategory', 'place', 'center', 'images')->pending()->whereIn('what_category_id', [1, 3, 4, 8, 18])->whereIn('place_id', $user_places)->where('english_check', '0')->orderby('id', 'desc')->get();

            $newsEngCheck = News::with('whatCategory', 'images')->pending()->forPlacesIncludingNational($user_places)->where('english_check', '0')->orderby('id', 'desc')->get();
        }



        $projectsNotPaid = ProjectFrench::with('project', 'projectEnglish')->where('translation_paid', 0)->get();
        $initiativesNotPaid = InitiativeFrench::with('initiative', 'initiativeEnglish')->where('translation_paid', 0)->get();
        $testimoniesNotPaid = TestimonyFrench::with('testimony', 'testimonyEnglish')->where('translation_paid', 0)->get();
        $successesNotPaid = SuccessFrench::with('success', 'successEnglish')->where('translation_paid', 0)->get();
        $newsNotPaid = NewsFrench::with('news', 'newsEnglish')->where('translation_paid', 0)->get();

        return view('new.admin.home', ['projectsAleppo' => $projectsAleppo, 'projectsHoms' => $projectsHoms, 'projectsDamascus' => $projectsDamascus, 'projectsCanceled' => $projectsCanceled,
            'projectsLatakia' => $projectsLatakia,
            'projectsWadi' => $projectsWadi,
            'projectsIdleb' => $projectsIdleb,
            'projectsTartus' => $projectsTartus,
            'projectsPublish' => $projectsPublish,

            'iniSchoolPublish' => $iniSchoolPublish, 'iniChildrenPublish' => $iniChildrenPublish,

            'iniDiscPublish' => $iniDiscPublish, 'iniStudyPublish' => $iniStudyPublish,'iniLeapPublish' => $iniLeapPublish,

            'sucDiscPublish' => $sucDiscPublish, 'sucStudyPublish' => $sucStudyPublish,

            'initiativesPublish' => $initiativesPublish, //            'successesPublish' => $successesPublish,
            'newsPublish' => $newsPublish,

//          'projectsTranslate' => $projectsTranslate,
//          'initiativesTranslate' => $initiativesTranslate,
//          'successesTranslate' => $successesTranslate,
//          'newsTranslate' => $newsTranslate,

            'projectsEngCheck' => $projectsEngCheck, //            'projectsEngCheck_a' => $projectsEngCheck_a, 'projectsEngCheck_h' => $projectsEngCheck_h, 'projectsEngCheck_d' => $projectsEngCheck_d,

            'iniSchoolEngCheck' => $iniSchoolEngCheck, 'iniChildrenEngCheck' => $iniChildrenEngCheck,

            'iniDiscEngCheck' => $iniDiscEngCheck, 'iniStudyEngCheck' => $iniStudyEngCheck,'iniLeapEngCheck' => $iniLeapEngCheck,

            'sucDiscEngCheck' => $sucDiscEngCheck, 'sucStudyEngCheck' => $sucStudyEngCheck, 'initiativesEngCheck' => $initiativesEngCheck, //            'successesEngCheck' => $successesEngCheck,
            'newsEngCheck' => $newsEngCheck,

            'initiativesNotPaid' => $initiativesNotPaid, 'projectsNotPaid' => $projectsNotPaid, 'testimoniesNotPaid' => $testimoniesNotPaid, 'successesNotPaid' => $successesNotPaid, 'newsNotPaid' => $newsNotPaid]);
    }
}
