<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'department' => 'required|string',
            'phone' => 'required|string'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => $validator->errors()->first(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        $ticket = Ticket::Create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department_id' => $request->department,
            "ticket_no" => uniqid('TIC-'),
        ]);
        $notification = array(
            'message' => 'Your service request is submitted and processed accordingly kindly hold on at the waiting area for instructions on proceeding to your service',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    }
}
