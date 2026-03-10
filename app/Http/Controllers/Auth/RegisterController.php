<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Admin;
use App\Trainee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use File;
use Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:trainee');
    }
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    public function showTraineeRegisterForm()
    {
        return view('auth.register', ['url' => 'trainee']);
    }
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/admin');
    }
    protected function createTrainee(Request $request)
    {
        $this->validator($request->all())->validate();
        $trainee = Trainee::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/trainee');
    }
}
