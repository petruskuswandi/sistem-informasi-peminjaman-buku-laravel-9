<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $req)
    {
        $credentials = $req->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            // cek apakah user status = active
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $req->session()->invalidate();
                $req->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet. please contact admin!');
                return redirect('/login');
            }

            $req->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Invalid login credentials. Username or password not registered.');
        return redirect('/login');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/logout');
    }

    public function registerProcess(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255', // Pastikan tabel pengguna (users) sesuai dengan struktur aplikasi Anda
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        Session::flash('status', 'success');
        Session::flash('message', 'Regist success. Wait admin for approval');
        return redirect('/register');
    }
}
