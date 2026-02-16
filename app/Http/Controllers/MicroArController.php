<?php

namespace App\Http\Controllers;

use App\Person;
use App\Person_MicroProject;
use App\MicroProject;
use Illuminate\Http\Request;

class MicroArController extends Controller
{
    public function index()
    {
        $someModel = new SomeModel;
        $someModel->setConnection('mysql2');
        $something = $someModel->find(1);
        return $something;

        $projectsAll = Project::with('english')->where('MPE_Published','1')->get();
        $projectsAleppo = Project::with('english')->where('MPE_Published','1')->where('MPE_City','0')->get();
        $projectsHoms = Project::with('english')->where('MPE_Published','1')->where('MPE_City','1')->get();

        return view('admin.projects-index', [
            'projectsAll' => $projectsAll,
            'projectsAleppo' => $projectsAleppo,
            'projectsHoms' => $projectsHoms,
        ]);
    }

}
