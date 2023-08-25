@extends('layouts.admin')
<title>Categories Dashbord</title>
@section('content')

<div class="row pt-4 p-2">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">Categories Table</h4>
          </div>
        </div>
        <div class="card-body px-0 pb-2 m-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
                <thead style="background-color: rgb(215, 215, 209)">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$item->image)}}" class="image" alt="image here">
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->slug}}</td>
                            <td>
                                <a href="{{url('edit-category/'.$item->id)}}"><button class="btn btn-primary">Edit</button></a>
                                <a href="{{url('delete-category/'.$item->id)}}"><button class="btn btn-danger">Delete</button></a>
                                <a href="{{url('details-category/'.$item->id)}}"><button class="btn btn-success">Details</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
