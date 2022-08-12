<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Ticket;
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

    public function createTicket()
    {
        $departments = Department::all();
        return view('admin.add_ticket',['departments' => $departments]);
    }

    public function ticket()
    {
        $tickets = Ticket::latest()->get();
        return view('admin.ticket',['tickets'=>$tickets]);
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
    public function waitList()
    {
        $tickets = Ticket::where('status', 'PENDING')->orWhere('status', 'PROCESSING')->get();
        return view('waitlist',['tickets'=>$tickets]);
    }
    
    public function getWaitList()
    {
        $tickets = Ticket::where('status', 'PENDING')->orWhere('status', 'PROCESSING')->get();
        return response()->json(['status' => true, 'data' => $tickets]);
    }


}
