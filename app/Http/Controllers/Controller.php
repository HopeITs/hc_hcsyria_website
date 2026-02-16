<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const MICRO = 0;
    const INITIATIVES = 1;
    const SUCCESSES = 2;
    const NEWS = 3;
    const EDITIONS = 4;
    const TEAM = 5;
    const SUBSCRIBERS=6;
    const COVER = 9;
    const ProjectContent = 10;

    const Magazine = 11;
    public function saveToLog($category, $id, $msg){
        $log = new Log;
        $log->category = $category;
        $log->project_id = $id;
        $log->operation = $msg;
        $log->user_id = Auth::user()->id;
        $log->seen = 0;
        $log->save();
    }

    public function saveToLogWithData($category, $id, $msg, $prev, $curr){
        $log = new Log;
        $log->category = $category;
        $log->project_id = $id;
        $log->operation = $msg;
        $log->user_id = Auth::user()->id;
        $log->seen = 0;
        $log->previous_data = $prev;
        $log->current_data = $curr;
        $log->save();
    }

}
