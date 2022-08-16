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
        if (auth()->user()->role == "ADMIN" || auth()->user()->role == "FRONTDESK"){
            $tickets = Ticket::latest()->get();
        }
        if (auth()->user()->role == "OFFICER"){
            $tickets = Ticket::where('department_id', auth()->user()->department_id)->get();
        }

        return view('admin.ticket',['tickets'=>$tickets]);
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users',['users' => $users]);
    }

    public function home()
    {
        return view('home');
    }
    public function guest()
    {
        $departments = Department::all();
        return view('booksession',['departments'=>$departments]);
    }
    public function waitList()
    {
        $tickets = Ticket::where('status', 'PENDING')->orWhere('status', 'PROCESSING')->get();
        return view('waitlist',['tickets'=>$tickets]);
    }
}
