<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected function customLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $notification = array(
                'message' => 'Login successfully!',
                'alert-type' => 'success'
            );
            if (auth()->user()->usertype == 'agent') {
                return redirect()->route('agent')
                    ->with($notification);
            }
            if (auth()->user()->role == 'FRONTDESK') {
                return redirect()->route('ticket')
                ->with($notification);
            }
            if (auth()->user()->role == 'OFFICER') {
                return redirect()->route('ticket')
                ->with($notification);
            }
            return redirect()->route('dashboard')
                ->with($notification);
        } else {
            $notification = array(
                'message' => 'Invalid Email Or Password!',
                'alert-type' => 'error'
            );
            return redirect()->back()
                ->with($notification);
        }
    }

    public function logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Logout Successfully!',
            'alert-type' => 'success'
        );
        return redirect('/signin')->with($notification);
    }
}
