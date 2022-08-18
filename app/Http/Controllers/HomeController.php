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
        $departments = Department::paginate(5);
        $departmentIds = $departments->pluck('id')->toArray();
        $tickets = Ticket::where('status', 'PENDING')->orWhere('status', 'PROCESSING')->get();
        return view('waitlist',['tickets' => $tickets, 'departments' => $departments, 'departmentIds' => json_encode($departmentIds)]);
    }
    
    public function getWaitList()
    {
        
        $tickets = Ticket::with('department')->where(function ($q) {
            $q->where('status', 'PENDING')->orWhere('status', 'PROCESSING');
        })->whereIn('department_id', request()->department_ids)->select('ticket_no', 'department_id')
        ->get();
        $departments = Department::with('ticket')->whereIn('id', request()->department_ids)->get();
        return response()->json(['status' => true, 'data' => $tickets, 'departments' => $departments]);
    }


}
