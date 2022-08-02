{{-- Extends layout --}}
@extends('layouts.admin')


{{-- Content --}}
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Users</h1>
    <a href="{{ route('user.view')}}" class="btn btn-primary h3 mb-3">Add User</a>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Users</h5>
                </div>
                <div class="card-body">
                    <table class="table table-stripped">
                        <tr>
                            <th scope="col">ID</th> 
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Role</th>
                            <th scope="col">Department</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr> 
                        @forelse ($users as $u)
                        <tr>
                            <td>
                                <span>{{$u->id}}</span>
                            </td>
                            <td>
                                <span>{{$u->firstname}} {{$u->lastname}}</span>
                            </td>
                            <td>
                                <span>{{$u->phone}}</span>
                            </td>
                            <td>
                                <span>{{$u->role}}</span>
                            </td>
                            <td>
                                <span>{{$u->department->name}}</span>
                            </td>
                            <td>
                                <span>{{$u->email}}</span>
                            </td>
                            <td>
                                <span>Actions here</span>
                            </td>
                        </tr> 
                        @empty
                        <tr>
                            <h5 class="card-title mb-0">Oops no Users yet</h5>
                            <a href="{{ route('user.view')}}" class="btn btn-primary h3 mb-3">Click here to Add a User</a>
                        </tr>
                        @endforelse
                    </table> 
                        
                </div>
            </div>
        </div>
    </div>

</div>
@endsection