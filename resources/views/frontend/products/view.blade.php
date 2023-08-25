@extends('layouts.front')

@section('title', $product->name)

@section('content')
  <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ url('/add-rating') }}" method="POST">
                        @csrf
                            <div class="modal-header">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <h5 class="modal-title" id="exampleModalLabel">Rate {{ $product->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="rating-css">
                                    <div class="star-icon">
                                        @if ($user_rating)
                                        @for ($i =1; $i<= $user_rating->stars_rated; $i++)
                                         <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                         <label for="rating{{$i}}" class="fa fa-star"></label>
                                        @endfor
                                        @for ($j = $user_rating->stars_rated;  $j<=5; $j++)
                                            <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                            <label for="rating{{$j}}" class="fa fa-star"></label>

                                        @endfor 

                                     @else

                                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" value="2" name="product_rating" id="rating2">
                                            <label for="rating2" class="fa fa-star"></label>
                                            <input type="radio" value="3" name="product_rating" id="rating3">
                                            <label for="rating3" class="fa fa-star"></label>
                                            <input type="radio" value="4" name="product_rating" id="rating4">
                                            <label for="rating4" class="fa fa-star"></label>
                                            <input type="radio" value="5" name="product_rating" id="rating5">
                                            <label for="rating5" class="fa fa-star"></label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Rate</button>
                            </div>
                    </form>
                </div>
                </div>
            </div>
        <div class="py-3-mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h5 class="mb-0" style="padding: 5px">
                <a href="{{ url('category') }}">Collections</a> /
                <a href="{{ url('view-category/'.$product->category->slug) }}">{{ $product->category->name }}</a>  /
                <label for="">
                    {{ $product->name }}
                </label>
            </h5>
        </div>
    </div>
    <div class="container pb-5">
        <div class="card-shadow product_data" style="margin-top: 20px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-radius">
                        <img src="{{ asset('assets/uploads/product/'.$product->image) }}"  class="image" alt="products image">
                    </div>
                    <div class="col-md-8">
                        <h2 class="m-3">
                            {{ $product->name }}
                            @if($product->trending == '1')
                                <label style="font-size: 16px;" class="float-end btn btn-danger trending_tag">Trending</label>
                            @endif
                        </h2>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="fw-bold">Selling Price : Rs {{ $product->selling_price }}</label>
                            </div>
                            <div class="col-md-6 ">
                                @php
                                $ratenum = number_format($rating_value)
                                @endphp
                                <div class="rating">
                                    <span>
                                        @if ($ratings->count() > 0)
                                        @for ($i =1; $i<= $ratenum; $i++)
                                        <i class="fa fa-star check"></i>
                                        @endfor
                                        @for ($j = $ratenum+1;  $j<=5; $j++)
                                        <i class="fa fa-star"></i>
                                        @endfor
                                            {{ $ratings->count() }} Ratings
                                            @else
                                                No Ratings
                                            @endif
                                    </span>
        
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>brief</h4>
                                    <p class="mt-3">
                                        <p class="mt-3"> {{ $product->small_description }} </p>
                                    </p>
                            </div>
                            <div class="col-md-6 ">
                                @if ($product->qty > 0)
                            <label class="btn btn-success float-end">In Stock</label>
                                @else
                                    <label class="btn btn-danger float-end">Out Of Stock</label>
                                @endif
                            </div>
                        </div>
                        <br>
                        <br>
                        @if ($product->qty > 0)
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden"  class="prod_id" value="{{ $product->id }}">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                                <div class="col-md-10">
                                        <button type="button" class="btn btn-primary addToCartBtn me-3 float-end">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                                        <button type="button" class="btn btn-success me-3 addToWishlist  float-end">Add To Wishlist <i class="fa fa-heart"></i></button>
                                        
                                        @elseif ($product->qty == 0 )
                                        <input type="hidden"  class="prod_id" value="{{ $product->id }}">
                                        <button type="button" class="btn btn-success me-3 addToWishlist  float-end">Add To Wishlist <i class="fa fa-heart"></i></button>
                                        @endif
                                </div>
                             </div>
                                
                        <br>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Description</h3>
                                <p class="mt-3">
                                    {{  $product->description  }}
                                </p>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-link float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Rate This Product
                            </button>
                        </div>
                    </div>
                    <hr>
                </div>
                
                <div class="row">
                    <div class="col-md-6 border">
                        @if ($reviews->count() > 0)
                        @foreach ($reviews as $item)
                        <div class="user-review">
                            <div class="col-md-2 float-end">
                                <label for="">Reviewd on</label>
                                <br>
                                <small> {{ $item->created_at->format('d M Y') }}</small>
                                @if ($item->user->id == Auth::id())
                                <a class="m-4" href="{{ url('edit-review/'.$item->product->name) }}">Edit</a>
                                @endif  
                            </div>
                            <div class="col-md-10 mt-2">
                                <label for="">{{ $item->user->name .' '.$item->user->lname }}</label>
                            <br>
                            {{-- @php
                                $rating = App\Models\Rating::where('prod_id', $product_id)->where('user_id', $item->user->id)->first();
                            @endphp --}}
                            @if ($item->rating)
                                @php
                                    $user_rated = $item->rating->stars_rated
                                @endphp
                                @for ($i =1; $i<= $user_rated; $i++)
                                <i class="fa fa-star check"></i>
                                @endfor
                                @for ($j = $user_rated+1;  $j<=5; $j++)
                                <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            <p>{{ $item->user_review }}</p>
                            </div> 
                        </div>
                        {{-- <br> --}}
                        <hr>   
                        @endforeach
                        @else
                        <h2 class="text-center m-5"> Write <i class="fa fa-comment"> </i> a review Please</h2>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="box m-3">
                            <p for="">We Care about Your Opinion in</p>
                            <form action="{{ url('add-review') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea name="user_review" required rows="5" class="form-control" placeholder="Write a Review"></textarea>
                                <button type="submit" class="btn btn-primary float-end m-3" style="
                                border-radius: 10px;">Submit</button>
                            </form>                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
