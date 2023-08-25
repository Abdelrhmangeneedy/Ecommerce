@extends('layouts.front')

@section('title')
    View Order
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="card m-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white text-capitalize ps-3">Order View
                        <a href="{{ url('my-orders') }}" class="text-capitalize ps-3 btn btn-warning text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shopping Details</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border">{{ $orders->fname }}</div>
                            <label for="">Last Name</label>
                            <div class="border">{{ $orders->lname }}</div>
                            <label for="">Email</label>
                            <div class="border">{{ $orders->email }}</div>
                            <label for="">Contact No</label>
                            <div class="border">{{ $orders->phone }}</div>
                            <label for="">Shopping Address</label>
                            <div class="border">
                                {{ $orders->address1 }} / <br>
                                {{ $orders->address2 }} / <br>
                                {{ $orders->city }} / <br>
                                {{ $orders->state }} /
                                {{ $orders->country }} /
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $orders->pincode }}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table table-border align-items-center mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quntity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty}}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->price*$item->qty }}</td>

                                            <td><img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" width="50px" alt="product image"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="m-3">
                                <h4 class="px-2">Grand Total -: <span class="float-end">{{ $orders->total_price }}</span></h4>
                                <h6 class="px-2">Payment mode -: {{ $orders->payment_mode }}</h6>
                                <div class="mt-5 px-2">
                                    <label for="">Order Status</label>
                                    <h6>{{ $orders->status ? 'Completed':'Pending'}} 
                                        @if ($orders->status == '1')
                                        <label for="" class="float-end">Your Order Up to Arrive Within 5 Days</label>
                                    @endif</h6>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
