<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ url('dashboard')}}" target="_blank">
        <h4 class="ms-1 font-weight-bold text-white">Example Shop</h4>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item {{Request::is('dashboard') ? 'active bg-gradient-primary':''}}">
          <a class="nav-link text-white" href="{{ url('dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{Request::is('add-category') ? 'active bg-gradient-primary':''}}">
            <a class="nav-link text-white " href="{{ url('add-category')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">library_add</i>
              </div>
              <span class="nav-link-text ms-1">Add Category</span>
            </a>
          </li>
          
          <li class="nav-item {{Request::is('add-product') ? 'active bg-gradient-primary':''}}">
            <a class="nav-link text-white " href="{{ url('add-product')}}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">library_add</i>
              </div>
              <span class="nav-link-text ms-1">Add Product</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admins') ? 'active bg-gradient-primary':'' }}">
            <a class="nav-link" href="{{url('admins')}}">
            <i class="material-icons">person</i>
            <span class="nav-link-text ms-1">Admins</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('add-admin') ? 'active bg-gradient-primary':'' }}">
            <a class="nav-link" href="{{url('add-admin')}}">
            <i class="material-icons">library_add</i>
            <span class="nav-link-text ms-1">Add Admins</span>
            </a>
          </li>
      </ul>
    </div>
    <div>
      <a href="{{ '/' }}">
        <img src="{{ asset('assets/img/slider1.jpg')}}" class="w-50 m-5" style="border-radius: 50%" alt="Example Image">
      </a>
    </div>
  </aside>
