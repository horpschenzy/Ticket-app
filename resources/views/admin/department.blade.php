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
                    <table class="table table-stripped">
                        <tr>
                            <th scope="col">ID</th> 
                            <th scope="col">Department</th>
                            <th scope="col">Audio</th>
                            @if(auth()->user()->role == "ADMIN")
                            <th scope="col">Actions</th>
                            @endif
                        </tr> 
                        @forelse($departments as $d)
                        <tr>
                            <td>
                                <span>{{$d->id}}</span>
                            </td>
                            <td>
                                <span>{{$d->name}}</span>
                            </td>
                            <td>
                                <script>
                                    function play() {
                                      var audio = document.getElementById("audio");
                                      audio.play();
                                    }
                                  </script>
                                  <a class="" value="PLAY" onclick="play()">Audio</a>
                                <audio id="audio" src="{{asset('/audio' .'/'.auth()->user()->department->audio)}}"></audio>
                            </td>
                            @if(auth()->user()->role == "ADMIN")
                            <td class="nav-item dropdown">
                                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                    <i class="align-middle" data-feather="settings"></i>
                                </a>
                                <span class=" dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">Actions</span>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="/departments/{{$d->id}}/manage"><i class="align-middle me-1" data-feather="edit"></i>Edit</a>
                                    <form method="POST" action="/departments/{{$d->id}}/delete">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item">
                                            <i class="align-middle me-1" data-feather="delete"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr> 
                        @empty
                        <tr>
                            <td>
                                <h5 class="card-title mb-0">Oops no Departments yet</h5>
                                <a href="{{ route('department.view')}}" class="btn btn-primary h3 mb-3">Click here to Add a Departments</a>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                        </tr> 
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection