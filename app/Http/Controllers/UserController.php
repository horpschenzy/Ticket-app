<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|string',
            'phone' => 'required|string'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => $validator->errors()->first(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        $user = User::Create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'role' => $request->role,
            'department_id' => $request->department,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $notification = array(
            'message' => 'User Added successfully!',
            'alert-type' => 'success'
        );
        return redirect('/users')->with($notification);
    }
    public function addUserView()
    {
        $departments = Department::all();
        return view('admin.add_user', ['departments' => $departments]);
    }
}
