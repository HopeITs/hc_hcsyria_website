<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\UserCenter;
use App\Models\UserPermission;
use App\Models\UserPlace;
use App\Models\UserRole;
use App\Place;
use App\Role;
use App\StudyzoneCenter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $users = User::with('roles', 'places')->get();
        $activeUsers = User::with('roles', 'places','permissions','centers')->where('active', 1)->get();
        $inactiveUsers = User::with('roles', 'places')->where('active', 0)->get();

        return view('new.admin.users.index', ['users' => $users, 'activeUsers' => $activeUsers, 'inactiveUsers' => $inactiveUsers,]);
    }

    public function store(Request $request)
    {
        $request->validate(['email' => 'unique:users',]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->filled('roles')) {
            $user->roles()->attach(array_map('intval', $request->input('roles')));
        }
        if ($request->filled('places')) {
            $user->places()->attach(array_map('intval', $request->input('places')));
        }
        if ($request->filled('permissions')) {
            $user->permissions()->attach(array_map('intval', $request->input('permissions')));
        }
        if ($request->filled('centers')) {
            $user->centers()->attach(array_map('intval', $request->input('centers')));
        }

        return redirect()->back()->with('success', 'User ' . $request->id . ' created');
    }

    public function update(Request $request ,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->isDirty('email')) {
            $request->validate(['email' => 'unique:users',]);
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->filled('roles')) {
            $user->roles()->sync(array_map('intval', $request->input('roles')));
        }
        if ($request->filled('places')) {
            $user->places()->sync(array_map('intval', $request->input('places')));
        }

        if ($request->filled('permissions')) {
            $user->permissions()->sync(array_map('intval', $request->input('permissions')));
        }

        if ($request->filled('centers')) {
            $user->centers()->sync(array_map('intval', $request->input('centers')));
        }

        $user->save();
        return redirect()->back()->with('success', 'User ' . $request->id . ' updated');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        UserCenter::where('user_id', $id)->delete();
        UserRole::where('user_id', $id)->delete();
        UserPermission::where('user_id', $id)->delete();
        UserPlace::where('user_id', $id)->delete();
        return redirect()->back()->with('success', 'User deleted');
    }

    public function activate(Request $request)
    {
        User::where('id', $request->input('id'))->update(['active' => 1]);
        return redirect()->back()->with('success', 'User ' . $request->input('id') . ' activated');
    }

    public function deactivate(Request $request)
    {
        User::where('id', $request->input('id'))->update(['active' => 0]);
        return redirect()->back()->with('success', 'User ' . $request->input('id') . ' inactivated');
    }

    public function create()
    {
        $roles = Role::get();
        $places = Place::get();
        $permissions = Permission::get();
        $centers = StudyzoneCenter::get();
        return view('new.admin.users.user-create', [
            'all_roles' => $roles,
            'all_places' => $places,
            'permissions' => $permissions,
            'centers' => $centers

        ]);
    }

    public function edit($id)
    {
        $userEdited = User::with('places', 'roles','permissions','centers')->find($id);
        $user_places = [];
        $user_roles = [];
        $user_permissions = [];
        $user_centers = [];

        foreach ($userEdited['places'] as $i) {
            array_push($user_places, $i->id);
        }
        foreach ($userEdited['roles'] as $i) {
            array_push($user_roles, $i->id);
        }
        foreach ($userEdited['permissions'] as $i) {
            array_push($user_permissions, $i->id);
        }
        foreach ($userEdited['centers'] as $i) {
            array_push($user_centers, $i->id);
        }

        $roles = Role::get();
        $places = Place::get();
        $permissions = Permission::get();
        $centers = StudyzoneCenter::get();

        if (is_null($userEdited)) {
            return view('new.errors.404');
        }

        return view('new.admin.users.user-edit', [
            'userEdited' => $userEdited,
            'all_roles' => $roles,
            'all_places' => $places,
            'permissions' => $permissions,
            'centers' => $centers,
            'user_places' => $user_places,
            'user_roles' => $user_roles,
            'user_permissions' => $user_permissions,
            'user_centers' => $user_centers
        ]);
    }
}
