<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        $rentLogs = RentLogs::with(['user', 'book'])->get();
        return view('pages.rentlog', ['rent_logs' => $rentLogs]);
    }
}
