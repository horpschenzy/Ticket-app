<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function addDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'code' => '01',
            ]);
        }
        $audio = '';
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $fullaudio = time().'.'.$audio->getClientOriginalExtension();
            $dest = public_path('/audio');
            $audio->move($dest,$fullaudio);
            $audio = $fullaudio;
        }
        $department = Department::Create([
            'name'=>$request->name,
            'audio'=>$audio
        ]);
        return redirect('/department')->with('message','Department Added successfully');
    }
    public function addDepartmentView()
    {
        return view('admin.add_department');
    }
    public function edit(Department $department)
    {
        if(auth()->user()->role != "ADMIN"){
            abort(403, 'Unauthorized Action');
        }
        return view('admin.edit_department',['department' =>$department]);
    }
    public function update(Department $department, Request $request)
    {
        if(auth()->user()->role != "ADMIN"){
            abort(403, 'Unauthorized Action');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
                'code' => '01',
            ]);
        }
        $audio = '';
        if ($request->hasFile('audio')) {
        $audio = $request->file('audio');
        $fullaudio = time().'.'.$audio->getClientOriginalExtension();
        $dest = public_path('/audio');
        $audio->move($dest,$fullaudio);
        $audio = $fullaudio;
        }
        $department -> update([
            'name'=>$request->name,
            'audio'=>$audio
        ]);
        return redirect('/department')->with('message','Department Updated Successfully');
    }
    public function delete(Department $department)
    {
        $check = Ticket::where('department_id', $department->id)->count();
        $check2 = User::where('department_id', $department->id)->count();
        // dd($check);
        if($check > 0 || $check2 > 0){
            return redirect('/department')->with('message','Please delete TICKETS/USERS relating to this department');
        }
        if(auth()->user()->role != "ADMIN"){
            abort(403, 'Unauthorized Action');
        }
        $department->delete();
        return redirect('/department')->with('message','Department Deleted Successfully');
    }
}
