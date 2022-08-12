<?php

namespace App\Http\Controllers;

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
    public function edit($id)
    {
        return view('admin.edit_department');
    }
    public function update()
    {

    }
}
