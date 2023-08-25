@extends('layouts.admin')
<title>Users Dashbord</title>
@section('content')

<div class="row pt-4">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">Users Table</h4>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone Numbar</th>
                        <th>E-mail</th>
                        <th>Action</th>
                    </tr>
                </thead>
              <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                          <a href="{{url('details-user/'.$item->id)}}"><button class="btn btn-info">Details</button></a>
                          <a href="{{url('delete-user/'.$item->id)}}"><button class="btn btn-primary">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
