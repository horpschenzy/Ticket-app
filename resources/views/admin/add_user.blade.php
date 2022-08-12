{{-- Extends layout --}}
@extends('layouts.admin')


{{-- Content --}}
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Add User</h1>
    {{-- {{ route(add.department.view)}} --}}

    {{-- <a href="" class="btn btn-primary h3 mb-3">Add Department</a> --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Departments</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('add.user')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="text" name="firstname" class="form-control" placeholder="First name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Last name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" placeholder="Phone number">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            <select name="role" class="custom-select" required>
                              <option value="">Select Role</option>
                              <option value="ADMIN">Admin</option>
                              <option value="OFFICER">Officer</option>
                              <option value="FRONTDESK">Front Desk</option>
                            </select>
                            <div class="invalid-feedback">Example invalid custom select feedback</div>
                          </div>
                        <br>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Select Department</label>
                            <select name="department" class="custom-select" required>
                                @forelse($departments as $d)
                              <option value="{{$d->id}}">{{$d->name}}</option>
                              @empty
                              <option>No departments Yet</option>
                            @endforelse
                            </select>
                            <div class="invalid-feedback">Example invalid custom select feedback</div>
                          </div>
                          <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
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