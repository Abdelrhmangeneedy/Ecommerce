@extends('layouts.admin')
<title>Category Details Dashbord</title>
@section('content')

<div class="row pt-4 p-2">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">Categories Details Table</h4>
            <h6 class="text-white text-capitalize ps-3">Category Name :- {{$category->name}}</h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2 m-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 text-center">
                <thead  style="background-color: rgb(215, 215, 209)">
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/'.$category->image)}}" class="image" alt="image here">
                            </td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>{{$category->status ? 'Not Showed':'Showed'}}</td>
                        </tr>
                    
                </tbody>
            </table>
            <table class="table align-items-center mb-0 text-center">
                <thead  style="background-color: rgb(215, 215, 209)">
                    <tr>
                        <th>Small Descrption</th>
                        <th>Descrption</th>
                        <th>Popular</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>{{$category->small_description}}</td>
                            <td>{{$category->description}}</td>
                            <td>{{$category->popular ? 'Popular':'UnPopular' }}</td>
                        </tr>
                    
                </tbody>
            </table>
            <table class="table align-items-center mb-0 text-center">
                <thead  style="background-color: rgb(215, 215, 209)">
                    <tr>
                        <th>Company Attached</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{$category->product->count()}} Product</td>
                            <td>{{ date('d-m-y', strtotime($category->created_at)) }}</td>
                            <td>
                                <a href="{{url('edit-category/'.$category->id)}}"><button class="btn btn-primary">Edit</button></a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endsection
