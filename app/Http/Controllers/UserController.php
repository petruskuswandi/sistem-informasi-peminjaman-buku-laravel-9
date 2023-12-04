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
        $users = User::where('role_id', 2)->where('status', 'active')->get();
        return view('pages.user', ['users' => $users]);
    }

    public function registeredUser()
    {
        $registeredUsers = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('pages.registered-user', ['registeredUser' => $registeredUsers]);
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('pages.user-detail', ['user' => $user]);
    }

    public function approve($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();

        return redirect('user-detail/' . $slug)->with('status', 'User Approved Successfully');
    }

    public function delete($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('pages.user-delete', ['user' => $user]);
    }

    public function destroy($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return redirect('users')->with('status', 'User Deleted Successfully');
    }

    public function bannedUser()
    {
        $bannedUsers = User::onlyTrashed()->get();
        return view('pages.user-banned', ['bannedUsers' => $bannedUsers]);
    }

    public function restore($slug)
    {
        $category = User::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('users')->with('status', 'Users Restored Successfully');
    }
}
