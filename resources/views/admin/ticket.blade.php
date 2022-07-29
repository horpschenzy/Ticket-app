{{-- Extends layout --}}
@extends('layouts.admin')


{{-- Content --}}
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Tickets</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table class="table table-stripped">
                        <thead>
                          <tr>
                            <th scope="col">Ticket No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Service Department</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($tickets as $t)
                          <tr>
                            <td>{{$t->ticket_no}}</td>
                            <td>{{$t->name}}</td>
                            <td>{{$t->phone}}</td>
                            <td>{{$t->email}}</td>
                            <td>{{$t->department_id}}</td>
                            <td>{{$t->status}}</td>
                            <td><a href="/view-ticket/{{$t->id}}">View Ticket</a></td>
                          </tr>
                          @empty
                            <h5 class="card-title mb-0">No Visitors Yet</h5>
                          {{-- <h4 class="mb-3">No Visitors Yet</h4> --}}
                          @endforelse
                        </tbody>
                      </table>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>

</div>
@endsection