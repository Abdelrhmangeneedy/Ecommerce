@extends('layouts.front')

@section('title')
    My Wishlist
@endsection
@section('content')
    <div class="py-3-mb-4 shadow-sm bg-warning border-top">
        <div class="container"  style="padding: 5px">
            <h5 class="mb-0"><a href="{{ url('category') }}">Collections</a>

            </h5>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow wishlistitem">
            <div class="col-body">
                @if ($wishlist->count() > 0)
                <div class="card-body">
                    @foreach ($wishlist as $item)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/product/'.$item->product->image) }}" class="image" alt="Image here">
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{ $item->product->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6> Price -: {{ $item->product->selling_price }} $</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            @if ($item->product->qty > 0)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width: 130px;">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="qunatity" class="form-control qty-input text-center" value="1">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                            @elseif (($item->product->qty == 0))
                                    <h6>Sorry This Product Is-: <s>Out Of Stock</s></h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            @if ($item->product->qty >= 1)
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            <button class="btn btn-primary addToCartBtn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            @else
                            <h6>Your wish up Comming <s class="m-5">Soon</s></h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            {{-- <button class="btn btn-danger removeWishlistItem m-3"><i class="fa fa-trash"></i> Remove</button> --}}
                            <a href="{{ url('deleteWishlist/'.$item->prod_id ) }}" class="btn btn-danger m-3"><i class="fa fa-trash"></i> Remove</a>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>

                @else
                <div class="card-bady text-center m-5">
                    <h2> your <i class="fa fa-shopping-cart"></i> Wishlist is Empty</h2>
                    <a href="{{ url('category')}}" class="btn btn-primary float-end m-3">Continue Shopping</a>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
