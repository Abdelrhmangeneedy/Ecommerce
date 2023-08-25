@extends('layouts.admin')
<title>Edit Product</title>
@section('content')
<div class="row pt-4 p-2">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">Edit/Update Product ::- {{ $product->name }}</h4>
          </div>
        </div>
        <div class="card-body px-0 pb-2 m-2">
            <form action="{{ url('update-product/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row m-5">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" required value="{{ $product->name }}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox"  {{ $product->status ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" required value="{{ $product->slug }}" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{ $product->trending ? 'checked' : ''}} name="trending">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" class="form-control" required value="{{ $product->original_price }}" name="original_price">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" required value="{{ $product->selling_price }}" name="selling_price">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Tax</label>
                        <input type="number" value="{{ $product->tax}}" class="form-control" required name="tax">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{ $product->qty}}" class="form-control" required name="qty">
                    </div>
                    <div class="col-md-12 mb3">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="3" class="form-control" required>{{ $product->small_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control" required>{{ $product->description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $product->meta_title}}" class="form-control" required name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="5" class="form-control" required>{{ $product->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="5" class="form-control" required>{{ $product->meta_description }}</textarea>
                    </div>

                    @if ($product->image)
                        <img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="image" alt="Product Image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
         </div>
      </div>
    </div>
</div>
@endsection
