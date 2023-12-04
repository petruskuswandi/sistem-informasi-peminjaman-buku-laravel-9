<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
        return view('profile', ['rent_logs' => $rentlogs] );
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
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('layouts.user-detail', ['user' => $user, 'rent_logs' => $rentlogs]);
    }
    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('/user-detail/' . $slug)->with("status", "Approve User Succesfully");
    }
    public function delete($slug)
    {
        $user = User::where("slug", $slug)->first();
        return view("layouts.user-ban", ["user" => $user]);
    }
    public function destroy($slug)
    {
        $user = User::where("slug", $slug)->first();
        $user->delete();
        return redirect("/users")->with("deleteStatus", "Ban User Succesfully");
    }
    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->get();
        return view("layouts.user-banned-list", ['bannedUsers' => $bannedUsers]);
    }
    public function restore($slug){
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect("/users")->with("status", "user Restored Succesfully");
    }
}
