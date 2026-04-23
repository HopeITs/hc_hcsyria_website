<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','english']);
    }

    public function index()
    {
        $hope = Profile::where('belong_to', 'hope')->get();
        $hope_h = Profile::where('belong_to', 'hope_h')->get();
        $hope_d = Profile::where('belong_to', 'hope_d')->get();
        $hope_l = Profile::where('belong_to', 'hope_l')->get();
        $study = Profile::where('belong_to', 'study')->get();
        $disc = Profile::where('belong_to', 'disc')->get();
        $children = Profile::where('belong_to', 'children')->get();
        $leap = Profile::where('belong_to', 'leap')->get();
        return view('new.admin.team.index', [
           'hope' => $hope,
            'hope_h' => $hope_h,
            'hope_d' => $hope_d,
            'hope_l' => $hope_l,
            'study' => $study,
            'disc' => $disc,
            'children' => $children,
            'leap' => $leap,
        ]);
    }

    public function create()
    {
        return view('new.admin.team.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'belong_to' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'image_path' => 'required|max:70',

            'position' => 'required',
            'email' => 'required',
            'rank' => 'required',

        ]);

        $profile = new Profile();
        $profile->belong_to = $request->input('belong_to');

        $imgName = $request->input('belong_to') . '_' . $request->input('first_name'). '_' . $request->input('last_name');
        $path = 'images/team/';
        $request->file('image_path')->move($path,$imgName.'.jpg');

        $profile->image_path = '/'.$path . $imgName . '.jpg';

        $profile->position_french = '0';

        $profile->linkedin_link = $request->filled('linkedin_link') ? $request->input('linkedin_link') : '0';
        $profile->facebook_link = $request->filled('facebook_link') ? $request->input('facebook_link') : '0';
        $profile->inactive = $request->filled('inactive') ? $request->input('inactive') : '0';

        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->position = $request->input('position');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');

        $profile->rank = $request->filled('rank') ? $request->input('rank') : '0';

        $profile->save();

        $this->saveToLog(self::TEAM, $profile->id,'Team Member Created');
        return redirect()->back()->with('team', 'Team Member '.$profile->id.' has been created');
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            return view('errors.404');
        }
        $profile = Profile::where('id', $id)->first();
        if (!isset($profile)) {
            return view('errors.404');
        }
        return view('new.admin.team.view', [
            'profile' => $profile,

            ]);
    }


    public function edit($id)
    {
        $profile = Profile::where('id',$id)->first();

        return view('new.admin.team.edit', [
            'profileData' => $profile,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'belong_to' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'image_path' => 'max:70',

            'position' => 'required',
            'email' => 'required',
            'rank' => 'required',
        ]);

        $profile = Profile::find($id);
        $profilePrev = Profile::find($id);
        if ($request->hasFile('image_path')) {
            File::delete($profile->image_path);
            $imgName = $request->input('belong_to') . '_' . $request->input('first_name'). '_' . $request->input('last_name');
            $path = 'images/team/';
            $request->file('image_path')->move($path,$imgName.'.jpg');

            $profile->image_path = '/'.$path . $imgName . '.jpg';
            $this->saveToLog(self::TEAM, $profile->id,'Image changed');
        }

        $profile->belong_to = $request->filled('belong_to') ? $request->input('belong_to') : '0';
        if ($profile->isDirty('belong_to')) {
            $this->saveToLogWithData(self::TEAM, $id,'belong_to Edited', $profilePrev->belong_to, $profile->belong_to);
        }
        $profile->rank = $request->filled('rank') ? $request->input('rank') : '0';
        if ($profile->isDirty('rank')) {
            $this->saveToLogWithData(self::TEAM, $id,'Rank Edited', $profilePrev->rank, $profile->rank);
        }

        $profile->facebook_link = $request->filled('facebook_link') ? $request->input('facebook_link') : '0';
        if ($profile->isDirty('facebook_link')) {
            $this->saveToLogWithData(self::TEAM, $id,'Facebook link Edited', $profilePrev->facebook_link, $profile->facebook_link);
        }
        $profile->linkedin_link = $request->filled('linkedin_link') ? $request->input('linkedin_link') : '0';
        if ($profile->isDirty('linkedin_link')) {
            $this->saveToLogWithData(self::TEAM, $id,'Linkedin link Edited', $profilePrev->linkedin_link, $profile->linkedin_link);
        }
        $profile->email = $request->filled('email') ? $request->input('email') : '0';
        if ($profile->isDirty('email')) {
            $this->saveToLogWithData(self::TEAM, $id,'Email Edited', $profilePrev->email, $profile->email);
        }
        $profile->phone = $request->filled('phone') ? $request->input('phone') : '0';
        if ($profile->isDirty('phone')) {
            $this->saveToLogWithData(self::TEAM, $id,'Phone Edited', $profilePrev->phone, $profile->phone);
        }
        $profile->first_name = $request->filled('first_name') ? $request->input('first_name') : '0';
        if ($profile->isDirty('first_name')) {
            $this->saveToLogWithData(self::TEAM, $id,'First Name Edited', $profilePrev->first_name, $profile->first_name);
        }
        $profile->last_name = $request->filled('last_name') ? $request->input('last_name') : '0';
        if ($profile->isDirty('last_name')) {
            $this->saveToLogWithData(self::TEAM, $id,'Last Name Edited', $profilePrev->last_name, $profile->last_name);
        }
        $profile->position = $request->filled('position') ? $request->input('position') : '0';
        if ($profile->isDirty('position')) {
            $this->saveToLogWithData(self::TEAM, $id,'Position Edited', $profilePrev->position, $profile->position);
        }

        $profile->inactive = $request->filled('inactive') ? $request->input('inactive') : '0';
        if ($profile->isDirty('inactive')) {
            $this->saveToLogWithData(self::TEAM, $id,'Status Edited', $profilePrev->inactive, $profile->inactive);
        }

        $profile->save();

        return redirect()->back()->with('team', 'Team Member '.$profile->id.' has been updated');
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);
        Profile::destroy($id);

        File::delete($profile->image_path);
        $this->saveToLog(self::TEAM, $profile->id, 'Team Member deleted');
        return redirect()->back()->with('team', 'Team Member deleted');
    }

}
