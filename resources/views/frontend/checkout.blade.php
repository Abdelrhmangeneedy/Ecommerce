@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3-mb-4 shadow-sm bg-warning border-top">
        <div class="container"  style="padding: 5px">
            <h5 class="mb-0"><a href="{{ url('category') }}">Collections</a>

            </h5>
        </div>
    </div>
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Baic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" required placeholder="Enter Your First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control last name" value="{{ Auth::user()->lname }}" name="lname" required placeholder="Enter Your Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control email" value="{{ Auth::user()->email }}" name="email" required placeholder="Enter Your Email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" required placeholder="Enter Your Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control address" value="{{ Auth::user()->address1 }}" name="address1" required placeholder="Enter Your Address">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 2 (potionally)</label>
                                <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2"  placeholder="Your second Address">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" required placeholder="Enter Your City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">State</label>
                                <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" required placeholder="Enter Your State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Country</label>
                                <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" required placeholder="Enter Your Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Pin code</label>
                                <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" required placeholder="Enter Your Pincode">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 container">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        
                        <hr>
                        @if ($cartitems->count() > 0)
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartitems as $item)

                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->product->selling_price }}</td>
                                        <td>{{ $total = $item->product->selling_price * $item->prod_qty }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>

                            <button type="submit" class="btn btn-success text-center w-100">Place Order</button>

                        @else
                        <div class="container my-2">
                            <div class="card-bady text-center">
                                <h2> you <i class="fa fa-shopping-cart"></i>Cart is Empty</h2>
                                <a href="{{ url('category')}}" class="btn btn-primary float-end">Continue Shopping</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
