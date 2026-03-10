<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Log;
use Illuminate\Support\Facades\DB;

class logController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index() {
        $logAll = Log::all();
        $projectsLog = Log::with('user','place')->where('category', 0)->whereYear('created_at', '>', date('2021'))->orderBy('created_at', 'desc')->get();
        $initiativesLog = Log::with('user')->where('category', 1)->whereYear('created_at', '>', date('2021'))->orderBy('created_at', 'desc')->get();
        $successesLog = Log::with('user')->where('category', 2)->whereYear('created_at', '>', date('2021'))->orderBy('created_at', 'desc')->get();
        $newsLog = Log::with('user')->where('category', 3)->whereYear('created_at', '>', date('2021'))->orderBy('created_at', 'desc')->get();
        $editionLog = Log::with('user')->where('category', 4)->whereYear('created_at', '>', date('2021'))->orderBy('created_at', 'desc')->get();
        $teamLog = Log::with('user')->where('category', 5)->whereYear('created_at', '>', date('2021'))->orderBy('created_at', 'desc')->get();
        $studentLog = Log::with('user')->where('category', 7)->whereYear('created_at', '>', date('2021'))->orderBy('created_at', 'desc')->get();
        return view('new.admin.log', [
            'logAll' => $logAll,
            'projectsLog' => $projectsLog,
            'initiativesLog' => $initiativesLog,
            'successesLog' => $successesLog,
            'newsLog' => $newsLog,
            'editionLog' => $editionLog,
            'teamLog' => $teamLog,
            'studentLog' => $studentLog,
        ]);
    }

    public function indexjson() {
//        $logAll = Log::all();
        $projectsLog = DB::select("SELECT logs.id as 'id', logs.operation AS 'operation',logs.project_id as 'project_id', users.name as 'username',logs.created_at as 'created_at',logs.previous_data as 'previous_data',logs.current_data as 'current_data' FROM logs
                                          LEFT JOIN users ON users.id = logs.user_id
                                          WHERE category = 0 and year(logs.created_at)>'2021'
                                         ");
        $initiativesLog = DB::select("SELECT logs.id as 'id',logs.operation AS 'operation',logs.project_id as 'project_id', users.name as 'username',logs.created_at as 'created_at',logs.previous_data as 'previous_data',logs.current_data as 'current_data' FROM logs
                                          LEFT JOIN users ON users.id = logs.user_id
                                          WHERE category = 1 and year(logs.created_at)>'2021'
                                          ORDER BY logs.created_at DESC");
        $successesLog = DB::select("SELECT logs.id as 'id',logs.operation AS 'operation',logs.project_id as 'project_id', users.name as 'username',logs.created_at as 'created_at',logs.previous_data as 'previous_data',logs.current_data as 'current_data' FROM logs
                                          LEFT JOIN users ON users.id = logs.user_id
                                          WHERE category = 2 and year(logs.created_at)>'2021'
                                          ORDER BY logs.created_at DESC");
        $newsLog = DB::select("SELECT logs.id as 'id',logs.operation AS 'operation',logs.project_id as 'project_id', users.name as 'username',logs.created_at as 'created_at',logs.previous_data as 'previous_data',logs.current_data as 'current_data' FROM logs
                                          LEFT JOIN users ON users.id = logs.user_id
                                          WHERE category = 3 and year(logs.created_at)>'2021'
                                          ORDER BY logs.created_at DESC");
        $teamLog = DB::select("SELECT logs.id as 'id',logs.operation AS 'operation',logs.project_id as 'project_id', users.name as 'username',logs.created_at as 'created_at',logs.previous_data as 'previous_data',logs.current_data as 'current_data' FROM logs
                                          LEFT JOIN users ON users.id = logs.user_id
                                          WHERE category = 5 and year(logs.created_at)>'2021'
                                          ORDER BY logs.created_at DESC");
        $studentLog = DB::select("SELECT logs.id as 'id',logs.operation AS 'operation',logs.project_id as 'project_id', users.name as 'username',logs.created_at as 'created_at',logs.previous_data as 'previous_data',logs.current_data as 'current_data' FROM logs
                                          LEFT JOIN users ON users.id = logs.user_id
                                          WHERE category = 7 and year(logs.created_at)>'2021'
                                          ORDER BY logs.created_at DESC");
//        $projectsLog = Log::with('user','place')->where('category', 0)->whereYear('created_at', '>', date('2020'))->orderBy('created_at', 'desc')->get();
//        $initiativesLog = Log::with('user')->where('category', 1)->whereYear('created_at', '>', date('2020'))->orderBy('created_at', 'desc')->get();
//        $successesLog = Log::with('user')->where('category', 2)->whereYear('created_at', '>', date('2020'))->orderBy('created_at', 'desc')->get();
//        $newsLog = Log::with('user')->where('category', 3)->whereYear('created_at', '>', date('2020'))->orderBy('created_at', 'desc')->get();
//        $editionLog = Log::with('user')->where('category', 4)->whereYear('created_at', '>', date('2020'))->orderBy('created_at', 'desc')->get();
//        $teamLog = Log::with('user')->where('category', 5)->whereYear('created_at', '>', date('2020'))->orderBy('created_at', 'desc')->get();
        return response()->json(['projectsLog' => $projectsLog, 'initiativesLog' => $initiativesLog,'successesLog' => $successesLog,'newsLog' => $newsLog,'teamLog' => $teamLog,'studentLog' => $studentLog]);
//        return view('new.admin.log', [
//            'logAll' => $logAll,
//            'projectsLog' => $projectsLog,
//            'initiativesLog' => $initiativesLog,
//            'successesLog' => $successesLog,
//            'newsLog' => $newsLog,
//            'editionLog' => $editionLog,
//            'teamLog' => $teamLog,
//        ]);

    }

    public function get_notifications() {
        return Log::with('user')
            ->where('seen',0)
            ->orWhereDate('created_at', Carbon::today()->addHours(3))
            ->get();
    }

    public function get_notifications_count() {
        return Log::with('user')->where('seen',0)->count();
    }

    public function clear_notifications() {
        Log::where('seen',0)->update(['seen' => 1]);
    }
}
