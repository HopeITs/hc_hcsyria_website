<?php

namespace App\Http\Controllers;
use App\HopeValues;
use App\HopeProjects;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $values = HopeValues::with('projects')->get();
        $projects = HopeProjects::with('values')->get();

        return view('training.home', [
            'values' => $values,
            'projects' => $projects,
        ]);
    }

    public function show_chat()
    {
            return view('training.add', [
            ]);
    }
}
