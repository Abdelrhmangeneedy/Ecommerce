@extends('layouts.admin')
<title>Product Details Dashbord</title>
@section('content')

<div class="row pt-4 p-2">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">Product Details Table</h4>
            <h6 class="text-white text-capitalize ps-3">Product Name:- {{$product->name}}</h6>
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
                        <th>Trending</th>
                        <th>Status</th>
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                        <tr>
                          <td>{{$product->id}}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/product/'.$product->image)}}" class="image" alt="image here">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->slug}}</td>
                            <td>{{$product->trending ? 'Trend' : 'Not Trend'}}</td>
                            <td>{{$product->status ? 'Not Showed' : 'Showed'}}</td>
                            <td>{{ date('d-m-y', strtotime($product->created_at)) }}</td>
                        </tr>
                 </tbody>
            </table>
            <br>
            <table class="table align-items-center mb-0 text-center">
              <thead  style="background-color: rgb(215, 215, 209)">
                  <tr>
                      <th>Small Description</th>
                      <th>Original Price</th>
                      <th>Selling Price</th>
                      <th>Quantity</th>
                      <th>Tax</th>
                      <th>Category Belonged</th>

                                            
                  </tr>
              </thead>
              <tbody>
                      <tr>
                          <td>{{$product->small_description}}</td>
                          <td>{{$product->original_price}}</td>
                          <td>{{$product->selling_price}}</td>
                          <td>{{$product->qty}}</td>
                          <td>{{$product->tax}}</td>
                          <td>{{$product->category->name}}</td>
                      </tr>
               </tbody>
          </table>
          <br>
            <table class="table align-items-center mb-0 text-center">
              <thead  style="background-color: rgb(215, 215, 209)">
                  <tr>
                    <th>Small Description</th>
                    <th>Meta Description</th>
                    <th>Meta Title</th>
                    <th>Meta Keywords</th>
                    <th>Edit</th>

                  </tr>
              </thead>
              <tbody>
                      <tr>
                        <td>{{$product->description}}</td>
                        <td>{{$product->meta_description}}</td>
                        <td>{{$product->meta_title}}</td>
                        <td>{{$product->meta_keywords}}</td>
                        <td><a href="{{url('edit-product/'.$product->id)}}"><button class="btn btn-primary">Edit</button></a></td>
                      </tr>
               </tbody>
          </table>
          </div>
        </div>
        </div>
    </div>
</div>

@endsection
