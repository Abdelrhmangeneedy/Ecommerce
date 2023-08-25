@extends('layouts.admin')

<title>Add Product</title>

@section('content')

<div class="row pt-4">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">Add Product</h4>
          </div>
        </div>
        <div class="card-body px-0 pb-2 m-2">
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row m-5">
                    <div class="col-md-8">
                        <select class="form-select" required name="cate_id">
                            <option value="">Select Category</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" required name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" required name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" name="trending">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" required name="original_price">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" required name="selling_price">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Tax</label>
                        <input type="number" class="form-control" required name="tax">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" required name="qty">
                    </div>
                    <div class="col-md-12 mb3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-12 mb3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" required name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea type="text" name="meta_keywords" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" name="meta_description" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
