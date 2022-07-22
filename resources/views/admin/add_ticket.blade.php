{{-- Extends layout --}}
@extends('layouts.admin')


{{-- Content --}}
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Add Ticket</h1>
    {{-- {{ route(add.department.view)}} --}}

    {{-- <a href="" class="btn btn-primary h3 mb-3">Add Department</a> --}}

    <div class="row" id="addticket">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ticket</h5>
                </div>
                <div class="card-body">
                  <form @submit.prevent="submit" method="POST" class="needs-validation">
                    @csrf
                  <div class="row g-3">
                    <div class="col-12">
                      <label for="firstName" class="form-label">Full Name</label>
                      <input type="text" v-model="form.name" class="form-control" id="name" placeholder="" value="" required>
                    </div>
        
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" v-model="form.email" class="form-control" id="email" placeholder="you@example.com" required>
                    </div>
        
                    <div class="col-12">
                      <label for="address" class="form-label">Phone Number</label>
                      <input type="tel" class="form-control" v-model="form.phone" id="address" placeholder="+234-1234" required>
                      <div class="invalid-feedback">
                        Please enter your Phone Number.
                      </div>
                    </div>
        
                    <div class="col-12">
                      <label for="country" class="form-label">Department</label>
                      <select class="form-select" v-model="form.department" id="country" required>
                        @forelse($departments as $d)
                        <option value="{{$d->id}}">{{$d->name}}</option>
                        @empty
                        <option value="">No departments yet</option>
                        @endforelse
                      </select>
                      <div class="invalid-feedback">
                        Please select a Department.
                      </div>
                    </div>
                  </div>
        
        
                  {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="save-info">
                    <label class="form-check-label" for="save-info">Save this information for next time</label>
                  </div> --}}
        
                  <hr class="my-4">
        
                  <button class="w-100 btn btn-primary btn-lg" type="submit">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection