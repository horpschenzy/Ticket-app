{{-- Extends layout --}}
@extends('layouts.admin')


{{-- Content --}}
@section('content')
<div class="container-fluid p-0">

    <h1 class="h3 mb-3">Add Remark To Ticket</h1>
    {{-- {{ route(add.department.view)}} --}}

    {{-- <a href="" class="btn btn-primary h3 mb-3">Add Department</a> --}}

    <div class="row" id="addRemark">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ticket</h5>
                </div>
                <div class="card-body">
                  <form action="/view-ticket/{{$ticket->id}}" method="POST" class="needs-validation">
                    @csrf
                    @method('PUT')
                  <div class="row g-3">
                    <div class="col-12">
                      <label for="firstName" class="form-label">Full Name</label>
                      <input value="{{$ticket->name}}" type="text" name="name" class="form-control" id="name" placeholder="" value="" disabled>
                    </div>
        
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <input value="{{$ticket->email}}" type="email" name="email" class="form-control" id="email" placeholder="you@example.com" disabled>
                    </div>
        
                    <div class="col-12">
                      <label for="address" class="form-label">Phone Number</label>
                      <input value="{{$ticket->phone}}" type="tel" class="form-control" name="phone" id="address" placeholder="+234-1234" disabled>
                      <div class="invalid-feedback">
                        Please enter your Phone Number.
                      </div>
                    </div>
        
                    <div class="col-12">
                      <label for="country" class="form-label">Department</label>
                      <input value="{{$ticket->department_id}}" type="text" class="form-control" name="department" id="address" placeholder="+234-1234" disabled>
                      <div class="invalid-feedback">
                        Please select a Department.
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                   {{-- @empty($ticket->remarks)
                   <div class="col-12">
                    <label for="address" class="form-label">Remark</label>
                    <textarea value="" type="text" class="form-control" name="remarks" id="address" placeholder="+234-1234" ></textarea>
                    <div class="invalid-feedback">
                      Please enter your Remark.
                    </div>
                  </div>
                  @endempty --}}
                  <div class="col-12">
                    <label for="address" class="form-label">Remark</label>
                    <textarea value="{{$ticket->remarks}}" type="text" class="form-control" name="remarks" id="address" placeholder="+234-1234" ></textarea>
                    <div class="invalid-feedback">
                      Please enter your Remark.
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
