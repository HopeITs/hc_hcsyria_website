<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class logController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index() {
        $baseQuery = Log::whereYear('created_at', '>', '2021');

        return view('new.admin.log', [
            'projectsCount' => (clone $baseQuery)->where('category', 0)->count(),
            'initiativesCount' => (clone $baseQuery)->where('category', 1)->count(),
            'successesCount' => (clone $baseQuery)->where('category', 2)->count(),
            'newsCount' => (clone $baseQuery)->whereIn('category', [3, 7])->count(),
            'teamCount' => (clone $baseQuery)->where('category', 5)->count(),
        ]);
    }

    public function indexjson(Request $request) {
        $category = $request->input('category', 0);
        $limit = $request->input('length', 50);
        $start = $request->input('start', 0);
        $search = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column', 4);
        $orderDir = $request->input('order.0.dir', 'desc');

        $query = Log::with('user')->whereYear('created_at', '>', '2021');

        if ($category == 3) {
            $query->whereIn('category', [3, 7]);
            $totalRecords = Log::whereIn('category', [3, 7])->whereYear('created_at', '>', '2021')->count();
        } else {
            $query->where('category', $category);
            $totalRecords = Log::where('category', $category)->whereYear('created_at', '>', '2021')->count();
        }

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('operation', 'LIKE', "%{$search}%")
                    ->orWhere('project_id', 'LIKE', "%{$search}%")
                    ->orWhereHas('user', function($uq) use ($search) {
                        $uq->where('name', 'LIKE', "%{$search}%");
                    });
            });
        }

        $filteredRecords = $query->count();

        $columns = ['id', 'operation', 'project_id', 'user_id', 'created_at'];
        if (isset($columns[$orderColumnIndex])) {
            $query->orderBy($columns[$orderColumnIndex], $orderDir);
        }

        $logs = $query->offset($start)->limit($limit)->get();

        $data = [];
        foreach ($logs as $log) {
            $data[] = [
                'id' => $log->id,
                'operation' => $log->operation,
                'project_id' => $log->project_id == 0 ? '-' : $log->project_id,
                'username' => $log->user ? $log->user->name : 'N/A',
                'created_at' => $log->created_at->toIso8601String(),
                'current_data' => $log->current_data,
                'previous_data' => $log->previous_data,
            ];
        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $data
        ]);
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