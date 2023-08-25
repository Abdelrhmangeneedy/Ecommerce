@extends('layouts.front')
<title>Example Shop</title>
@section('content')
  <div id="carouselExampleIndicators" class="carousel slide mt-3 " style="width:100%;" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('assets/img/slider1.jpg') }}" class="d-block w-100" alt="Image">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/img/slider2.jpg') }}" class="d-block w-100" alt="Image">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/img/slider3.jpg') }}" class="d-block w-100" alt="Image">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <h1 class="m-5">Trendding Products</h1>
              <div class="row">
                @foreach ($featured_products as $prod)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                      <a href="{{ url('category/'.$prod->name) }}">
                        <div class="card">
                          <img class="image" src="{{ asset('assets/uploads/product/'.$prod->image) }}" alt="images">
                          <div class="card-body">
                            <h5>{{ $prod->name }}</h5>
                            <span class="float-start">{{ $prod->selling_price }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="m-5">Trending Categories</h1>
                <div class="row">
                    @foreach ($trending_category as $tcategory)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <a href="{{ url('view-category/'.$tcategory->name) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/'.$tcategory->image) }}" class="image" alt="Category image">
                                <div class="card-body">
                                    <h5>{{ $tcategory->name }}</h5>
                                    <p>{{ $tcategory->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




