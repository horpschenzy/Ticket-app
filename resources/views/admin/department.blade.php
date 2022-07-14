{{-- Extends layout --}}
@extends('layouts.admin')


{{-- Content --}}
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Department</h1>
    <a href="{{ route('department.view')}}" class="btn btn-primary h3 mb-3">Add Department</a>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Departments</h5>
                </div>
                <div class="card-body">
                    @if(count($departments)>1)
                    <table class="table table-bodered">
                        <tr>
                            <th scope="col">ID</th> 
                            <th scope="col">Department</th>
                            <th scope="col">Actions</th>
                        </tr> 
                        @foreach($departments as $d)
                        <tr>
                            <td>
                                <span>{{$d->id}}</span>
                            </td>
                            <td>
                                <span>{{$d->name}}</span>
                            </td>
                            <td>
                                <span>Actions here</span>
                            </td>
                        </tr> 
                        @endforeach
                    </table>
                    @else
                    <h5 class="card-title mb-0">Opps no Departments yet</h5>
                    <a href="{{ route('department.view')}}" class="btn btn-primary h3 mb-3">Click here to Add a Departments</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection