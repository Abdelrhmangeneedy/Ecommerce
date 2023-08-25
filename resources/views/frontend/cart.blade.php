@extends('layouts.front')

@section('title')
    My Cart
@endsection
@section('content')
    <div class="py-3-mb-4 shadow-sm bg-warning border-top">
        <div class="container p-2">
            <h5 class="mb-0"><a href="{{ url('category') }}">Collections</a>
            </h5>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow cartitem">
            @if ($cartitems->count() > 0)
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($cartitems as $item)
                <div class="row product_data">
                    <div class="col-md-1 my-auto">
                        <img src="{{ asset('assets/uploads/product/'.$item->product->image) }}" class="image" alt="Image here">
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>{{ $item->product->name }}</h6>
                    </div>
                    @if ($item->product->qty >= $item->prod_qty)
                    <div class="col-md-2 my-auto">
                        <h6> Rs {{ $item->product->selling_price }}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <a href="#" >( Total price -: {{  $item->product->selling_price * $item->prod_qty }} $ )</a>
                    </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden" name="" class="prod_id" value="{{ $item->prod_id }}">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <button class="input-group-text changeQuantity decrement-btn">-</button>
                                <input type="text" name="qunatity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}">
                                <button class="input-group-text changeQuantity increment-btn">+</button>
                            </div>
                            @php
                                $total += $item->product->selling_price * $item->prod_qty;
                            @endphp
                    </div>
                        @else
                        <div class="col my-auto">
                            <h6>Sorry This Product Is-: <s>Out Of Stock</s></h6>
                        </div>
                        <div class="col my-auto">
                            <h6>Up Comming Soon</h6>
                        </div>
                        @endif
                    <div class="col-md-2 my-auto">
                        <input type="hidden" name="" class="prod_id" value="{{ $item->prod_id }}">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
                <hr>
                @endforeach
                
            </div>
            
            <div class="card-footer">
                <h6 class="m-2">Total Price -:  {{ $total }} $</h6>
                <a href="{{ url('checkout')}}" class="btn btn-outline-success float-end">Product to Checkout</a>
                </h6>
            </div>
            @else
            <div class="container my-2">
                <div class="card-bady text-center m-5">
                    <h2> your <i class="fa fa-shopping-cart"></i> Cart is Empty</h2>
                    <a href="{{ url('category')}}" class="btn btn-primary float-end m-3">Continue Shopping</a>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
