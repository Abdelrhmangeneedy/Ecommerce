<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ ('/') }}">Example-shop</a>
       <div class="search-bar">
            <form action="{{ url('searchproduct') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" name="product_name" id="search_product" placeholder="Search" required aria-describedby="basic-addon1">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">Categories</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/cart') }}">Cart
                <span class="badge badge-pill m-1 bg-primary cart-count"></span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ url('/wishlist') }}">WishList
                <span class="badge badge-pill m-1 bg-success whislist-count"></span>
              </a>
          </li>
          
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
            @else

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><a class="dropdown-item" href="{{ url('my-orders') }}">My Orders</a></li>
                    <div class="dropdown-divider"></div>
                 <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </ul>
                </li>

            @endguest
        </ul>
      </div>
    </div>
  </nav>

