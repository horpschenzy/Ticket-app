<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function signin()
    {
        return view('signin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function department()
    {
        $departments = Department::all();
        return view('admin.department',['departments' => $departments]);
    }

    public function ticket()
    {
        return view('admin.ticket');
    }

    public function users()
    {
        return view('admin.users');
    }
}
