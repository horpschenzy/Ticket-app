<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
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
        $users = User::all();
        return view('admin.users',['users' => $users]);
    }
    public function guest()
    {
        $departments = Department::all();
        return view('home',['departments'=>$departments]);
    }
}
