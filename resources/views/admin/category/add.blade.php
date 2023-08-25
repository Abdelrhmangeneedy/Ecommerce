@extends('layouts.admin')


<title>Add Category</title>


@section('content')

<div class="row pt-4 p-2">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">Add Category</h4>
          </div>
        </div>
        <div class="card-body px-0 pb-2 m-2">
            <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row m-5">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" required name="name">
                    </div>
                    <div class="col-md-3 mb-6">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-3 mb-6">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" required name="slug">
                    </div>
                    
                    <div class="col-md-6 mb3">
                        <label for="">Small Description</label>
                        <textarea required name="small_description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb3">
                        <label for="">Description</label>
                        <textarea required name="description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">choose Image</label>
                        <input type="file" required name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection
