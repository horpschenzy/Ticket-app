{{-- Extends layout --}}
@extends('layouts.admin')


{{-- Content --}}
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Add Department</h1>
    {{-- {{ route(add.department.view)}} --}}

    {{-- <a href="" class="btn btn-primary h3 mb-3">Add Department</a> --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Departments</h5>
                </div>
                <div class="card-body">
                    <form action="/departments/{{$department->id}}/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="exampleInputEmail1">Department Name</label>
                          <input type="text" value="{{$department->name}}" name="name" class="form-control" placeholder="Enter Department name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department Audio</label>
                            <input type="file" value="{{$department->audio}}" name="audio" class="form-control">
                          </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection