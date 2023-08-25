@extends('layouts.admin')


<title>Add Admin</title>


@section('content')

<div class="row pt-4 p-2">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">Add Admin</h4>
          </div>
        </div>
        <div class="card-body px-0 pb-2 m-2">
            <form action="{{ url('insert-admin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row m-5">
                    <div class="col-md-6">
                        <label for="">First Name</label>
                        <input type="text" class="form-control firstname"  name="fname" required placeholder="Enter admin First Name">
                        <span id="fname_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control last name"  name="lname" required placeholder="Enter admin Last Name">
                        <span id="lname_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="">Role As</label>
                        <input type="checkbox" required name="role_as">
                    </div>
                    <div class="col-md-6">
                        <label for="">Email</label>
                        <input type="text" class="form-control email"  name="email" required placeholder="Enter admin Email">
                        <span id="email_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="">Password</label>
                        <input type="text" class="form-control password"  name="password" required placeholder="Enter admin Password">
                        <span id="password_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control phone"  name="phone" required placeholder="Enter admin Phone Number">
                        <span id="phone_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="">Address</label>
                        <input type="text" class="form-control address"  name="address1" required placeholder="Enter admin Address">
                        <span id="address1_error" class="text-danger"></span>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection
