{{-- Extends layout --}}
@extends('layouts.admin')


{{-- Content --}}
@section('content')
<div class="container-fluid p-0">
  <script>
    function play() {
      var audio = document.getElementById("audio");
      audio.play();
    }
  </script>
  @if (isset(auth()->user()->department->audio))
    
  <button class="btn btn-primary float-end" value="PLAY" onclick="play()">Call Next Client</button>
  {{-- <audio id="audio" src="{{auth()->user()->department->audio}}"></audio> --}}
  <audio id="audio" src="{{asset('/audio' .'/'.auth()->user()->department->audio)}}"></audio>
  @endif

    <h1 class="h3 mb-3">Tickets</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table class="table table-stripped table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">Ticket No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Service Department</th>
                            <th scope="col">Status</th>
                            <th scope="col">Time</th>
                            @if (auth()->user()->role != "FRONTDESK")
                            <th scope="col">Action</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($tickets as $t)
                          <tr>
                            <td>{{$t->ticket_no}}</td>
                            <td>{{$t->name}}</td>
                            <td>{{$t->phone}}</td>
                            <td>{{$t->email}}</td>
                            <td>{{$t->department->name}}</td>
                            <td>{{($t->status == 'PROCESSING') ? 'ATTENDING' : $t->status }}</td>
                            <td>{{$t->created_at}}</td>
                            @if (auth()->user()->role != "FRONTDESK")
                            <td><a href="/view-ticket/{{$t->id}}">View Ticket</a></td>
                            @endif
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