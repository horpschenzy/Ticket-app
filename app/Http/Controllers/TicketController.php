<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function createTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'department' => 'required',
            'phone' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }
        $ticket = Ticket::Create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department_id' => $request->department,
            "ticket_no" => uniqid('TIC-'),
            "wait_time" => now(),
        ]);
        return response()->json([
                        "title" => "Dear $request->name,",
                        "message" => "Your service request is submitted and processed accordingly. \n
                            Kindly hold on at the waiting area for instructions on proceeding to your service"
                        ], 200);
    }
    public function viewTicket(Request $request, Ticket $ticket)
    {
        $ticket->status = 'PROCESSING';
        $ticket->save();
        return view('admin.view_ticket',['ticket' => $ticket]);
    }
    public function addRemark(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(),[
            'remarks' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }
        $ticket->update([
            'remarks' => $request->remarks,
            'status' => 'COMPLETED'
        ]);
        $notification = array(
            'message' => 'Ticket completed Successfully!',
            'alert-type' => 'success'
        );
        return redirect('/ticket')->with($notification);
    }
}
