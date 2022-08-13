<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = DB::table('users')->count();
        $totalCourse = DB::table('course')->count();
        $totalSection = DB::table('section')->count();
        $totalGroup = DB::table('group')->count();

        return view('admin.dashboard', compact('totalUser','totalCourse','totalSection','totalGroup'));
    }
}
