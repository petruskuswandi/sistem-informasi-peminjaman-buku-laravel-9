<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function index()
    {
        $users =  User::where('role_id', 2)->where('status', 'active')->get();
        return view('layouts.user', ['users' => $users]);
    }

    public function registeredUsers()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('layouts.registered-users', ['registeredUsers' => $registeredUsers]);
    }
    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('layouts.user-detail', ['user' => $user]);
    }
}
