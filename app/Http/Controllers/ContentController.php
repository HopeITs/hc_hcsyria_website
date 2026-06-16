<?php

namespace App\Http\Controllers;

use App\Donor;
use App\HopeProjects;
use App\Models\Cover;
use App\Models\HopeProjectMedia;
use App\Models\ProjectDonor;
use App\WhatCategory;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Database\Eloquent\Collection;
use File;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $what_categories = WhatCategory::with('content', 'partners')->whereIn('id', [5, 7, 8, 9, 10, 17, 19])->get();
        return view('new.admin.content.index', ['what_categories' => $what_categories]);
    }

    function show($id)
    {
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $what = HopeProjects::with('media')->where('what_category_id', $id)->first();
        return view('new.admin.content.view', ['what' => $what]);
    }

    function show_partners($id)
    {
        $what = WhatCategory::where('id', $id)->get();
        if (!is_numeric($id)) {
            return view('new.errors.404');
        }
        $partners_ongoing = ProjectDonor::where('what_category_id', $id)
            ->with('donors')
            ->where('isActive', 1)
            ->orderBy('rank', 'asc')
            ->get();
        $partners_previous = ProjectDonor::where('what_category_id', $id)
            ->with('donors')
            ->where('isActive', 0)
            ->orderBy('rank', 'asc')
            ->get();
        return view('new.admin.content.view-partners', ['what' => $what, 'partners_ongoing' => $partners_ongoing, 'partners_previous' => $partners_previous]);
    }

    public function ajaxForm($id)
    {
        $what = WhatCategory::with('content', 'partners')->find($id); // Avoid 404

        $donors = Donor::all();

        if (!$what) {
            // Return empty form if not found
            return view('new.admin.partials.public-content-form', [
                'donors' => $donors,
                'what' => null,
                'partners_ongoing' => [],
                'partners_previous' => [],
            ])->render();
        }

        // If $what found, continue normal logic
        $pongoing = ProjectDonor::where('what_category_id', $id)
            ->with('donors')
            ->where('isActive', 1)
            ->orderBy('rank', 'asc')
            ->get();

        $partners_ongoing = [];
        foreach ($pongoing as $item) {
            if ($item->donors) {
                $partners_ongoing[] = $item->donors->id;
            }
        }

        $pprevious = ProjectDonor::where('what_category_id', $id)
            ->with('donors')
            ->where('isActive', 0)
            ->orderBy('rank', 'asc')
            ->get();

        $partners_previous = [];
        foreach ($pprevious as $item) {
            if ($item->donors) {
                $partners_previous[] = $item->donors->id;
            }
        }

        return view('new.admin.partials.public-content-form', compact(
            'donors',
            'what',
            'partners_ongoing',
            'partners_previous'
        ))->render();
    }

    public function update(Request $request, $id)
    {
        $section = HopeProjects::where('what_category_id', $id)->with('media')->first();
        $request->validate([
            'description' => 'nullable|string',
        ]);
        $section->description = $request->input('description');
        $section->save();
        $this->saveToLog(self::ProjectContent, $section->id, 'Project Brief Updated');
        return back()->with('success', 'Brief updated successfully!');
    }


    public function create_images($id)
    {
        $HopeProjects_id = HopeProjects::where('what_category_id', $id)->select('id')->first()->id;
        $what = HopeProjects::with('media')->where('what_category_id', $id)->first();
        $images = [];
        if ($what->mediaType === 'image') {
            $images = HopeProjectMedia::where('project_id', $HopeProjects_id)->get();
        }
        return view('new.admin.content.projectbrief-media', ['what' => $what, 'images' => $images])->render();
    }

    public function store_image(Request $request)
    {
        $projectId = $request->input('project_id');
        $videoURL = $request->input('videoURL');
        $mediaType = $request->input('mediaType'); // "image" or "video"
        $what = HopeProjects::with('media')->where('id', $projectId)->first();
        $project = HopeProjects::findOrFail($projectId);
        $hasVideo = $project->media()->where('mediaType', 'video')->exists();
        $projectName = HopeProjects::where('id', $projectId)->value('name');
        if ($mediaType === 'video') {
            // remove all old media (images or videos)
            $project->media()->delete();

            // store only the new video
            $project->media()->create([
                'mediaType' => 'video',
                'mediaURL' => $videoURL
            ]);
        }

        if ($mediaType === 'image' && $request->hasFile('image')) {
            if ($hasVideo) {
                // remove video before saving images
                $project->media()->delete();
            }
            foreach ($request->file('image') as $i => $image) {
                $imgName = time() . $i . '.jpg';
                $path = 'images/home/' . $projectName . '/Brief/';

                $image->move($path, $imgName);

                $project->media()->create([
                    'mediaType' => 'image',
                    'mediaURL'  => '/'.$path.$imgName,
                ]);
            }
        }

        // reload fresh project with media
        $project->load('media');
        return redirect()->back()->with(['success', 'Brief updated successfully!','project' => $project, 'what' => $what,
            'images' => $project->media]);
//        return view('new.admin.content.projectbrief-media', [
//            'project' => $project, 'what' => $what,
//            'images' => $project->media,
//        ])->with('success', 'Media stored');
    }

    public function destroy(Request $request, $id)
    {
        $deletedImagesCount = 0;
        $what = HopeProjects::with('media')->where('id', $id)->first();

        $project_name = HopeProjects::where('id', $id)->select('name')->first()->name;
        $project = HopeProjectMedia::where('project_id', $id)->first();
        $images = HopeProjectMedia::where('project_id', $id)->get();
        foreach ($images as $img) {
            if ($request->input($img->id) == '1') {
                $deletedImagesCount++;
                $img->delete();
                File::delete($img->mediaURL);
            }
        }
        $images = HopeProjectMedia::where('project_id', $id)->get();
        $this->saveToLog(self::ProjectContent, $id, $deletedImagesCount .'Image Deleted');
        return redirect()->back()->with(['what' => $what, 'project' => $project, 'images' => $images, 'success' => 'Images removed']);
//        return view('new.admin.content.projectbrief-media', ['what' => $what, 'project' => $project, 'images' => $images])->with('success', 'Images removed');
    }

    public function order_images(Request $request)
    {
        $imageIdsArray = $request->input('imageIds');
        $count = 1;
        foreach ($imageIdsArray as $id) {
            $image = HopeProjectMedia::find($id);
            $image->mediaOrder = $count;
            $image->save();
            $count++;
        }
        return 'Images has been reordered !!';
    }

    public function save_partners(Request $request, $id)
    {
        $what = WhatCategory::findOrFail($id);
        $donorIdsOngoing = $request->input('partners_ongoing', []); // array of IDs

        $donorIdsPrevious = $request->input('partners_previous', []);

        // Clear existing for this category
        ProjectDonor::where('what_category_id', $id)->delete();

        // Save new ongoing donors
        foreach ($donorIdsOngoing as $donorId) {
            ProjectDonor::create([
                'what_category_id' => $id,
                'donor_id' => $donorId,
                'isActive' => 1,
                'rank' => 0
            ]);
        }

        // Save new previous donors
        foreach ($donorIdsPrevious as $donorId) {
            ProjectDonor::create([
                'what_category_id' => $id,
                'donor_id' => $donorId,
                'isActive' => 0,
                'rank' => 0
            ]);
        }
        return back()->with('success', 'Partners saved.');
    }
}
