<?php

namespace App\Http\Controllers;

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
        return view('admin.department');
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
