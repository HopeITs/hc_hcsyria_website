<?php

namespace App\Http\Controllers;
use App\HopeValues;
use App\HopeProjects;

class TrainingController extends Controller
{
    public function set_locale($locale)
    {
        session(['locale' => $locale]);
        return redirect()->back();
    }

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
//        $whatCategory = WhatCategory::whereRaw('replace(lower(name)," ","-") LIKE "' . $type . '"')->first();
//        if (is_null($whatCategory)) return view('errors.404');
//        $initiatives = Initiative::with('english', 'french', 'ImagesRandom')
//            ->where('what_category_id', $whatCategory->id)
//            ->where('online', '1')
//            ->orderBy('id','desc')
//            ->get();
//        if ($whatCategory->id == '3') {
//            foreach ($initiatives as $initiative) {
//                $imagesRehabilitation = InitiativeImageRehabilitation::where('initiative_id', $initiative->id)->get();
//                foreach ($imagesRehabilitation as $image) {
//                    $initiative->ImagesRandom->push(['path' => $image->path_1]);
//                    $initiative->ImagesRandom->push(['path' => $image->path_2]);
//                }
//                $randomImages = $initiative->ImagesRandom->shuffle()->all();;
//                unset($initiative->ImagesRandom);
//                $initiative->ImagesRandom = $randomImages;
//            }
//        }
//
//        if($whatCategory->id == '6') {
//            $testemonies = Success::with('english', 'french')
//                ->where('what_category_id', '6')//Homework Room
//                ->where('who_category_id', '4')//Children
//                ->where('online', '1')
//                ->get();
//
//            return view('public.initiatives', [
//                'initiatives' => $initiatives,
//                'whatCategory' => $whatCategory,
//                'testemonies' => $testemonies,
//            ]);
//        }
//        else{
            return view('training.add', [
//                'whatCategory' => $whatCategory
            ]);
//        }
    }
}
