<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index(){
        $rentlogs = RentLogs::with(['user', 'book'])->get();
        return view('layouts.rentlog', ['rent_logs' => $rentlogs]);
    }
}
