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
                    @if(count($users)>1)
                    <table class="table table-bodered">
                        <tr>
                            <th scope="col">ID</th> 
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr> 
                        @foreach($users as $u)
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
                                <span>{{$u->email}}</span>
                            </td>
                            <td>
                                <span>Actions here</span>
                            </td>
                        </tr> 
                        @endforeach
                    </table>
                    @else
                    <h5 class="card-title mb-0">Empty card</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection