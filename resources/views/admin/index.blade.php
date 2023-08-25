@extends('layouts.admin')
<title>Shop</title>
@section('content')
    <div class="card-body">
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">category</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Categories Count</p>
                  <h4 class="mb-0">{{ $countcat }}</h4>
                  <a href="{{ url('categories')}}">
                  <p class="text-sm mb-0 text-capitalize">More Information</p>
                  </a>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0">Our Services</p>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">weekend</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Products Count</p>
                  <h4 class="mb-0">{{ $countprod }}</h4>
                  <a href="{{ url('products')}}">
                    <p class="text-sm mb-0 text-capitalize">More Information</p>
                  </a>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-info text-sm font-weight-bolder">{{ $monthprod->count() }} </span>than Last Month</p>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">weekend</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Orders Count</p>
                  <h4 class="mb-0">{{ $countorder }}</h4>
                  <a href="{{ url('orders')}}">
                    <p class="text-sm mb-0 text-capitalize">More Information</p>
                  </a>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-info text-sm font-weight-bolder">{{ $monthorder->count() }} </span>This Month</p>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                  <h4 class="mb-0">{{ $countuser }}</h4>
                  <a href="{{ url('users')}}">
                    <p class="text-sm mb-0 text-capitalize">More Information</p>
                  </a>
                </div>
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-primary text-sm font-weight-bolder">{{ $monthuser }} Users</span> At This month</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2  ">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-info shadow-info border-radius-lg py-3 pe-1">
                  <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="mb-0 "> Monthly Sales Performance.  </h6>
                <p class="text-sm "><span class="text-info text-sm font-weight-bolder">{{ $lmonthprod }} </span> Last Month Sales. </p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                  <p class="mb-0 text-sm"> updated 4 min ago </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                  <div class="chart">
                    <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="mb-0 ">Monthly Orders Performance.</h6>
                <p class="text-sm "><span class="text-success text-sm font-weight-bolder">{{ $lmonthorder }}</span> Last Month Orders.</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                  <p class="mb-0 text-sm">just updated</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <div class="chart">
                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h6 class="mb-0 ">Last Users Performance.</h6>
                <p class="text-sm "><span class="text-primary text-sm font-weight-bolder">{{ $lmonthuser }} </span>Last Month Users.</p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                  <p class="mb-0 text-sm">sent 2 Minutes ago </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h6>Products</h6>
                    <p class="text-sm mb-0">
                      <i class="fa fa-check text-info" aria-hidden="true"></i>
                      <span class="font-weight-bold ms-1">{{ $monthprod->count() }} done</span> Within This Month
                    </p>
                  </div>
                  <div class="col-lg-6 col-5 my-auto text-end">
                    <div class="dropdown float-lg-end pe-4">
                      <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Slug</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($monthprod as $item)
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="{{ asset('assets/uploads/product/'.$item->image)}}" class="avatar avatar-sm me-3" alt="xd">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->slug }}</h6>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $item->category->name }}</h6>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-xs font-weight-bold"> {{ $item->created_at->format('d M Y') }} </span>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          {{-- <col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card h-100">
              <div class="card-header pb-0">
                <h6>Companies Done last Month</h6>
                <p class="text-sm">
                  <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                  <span class="font-weight-bold">{{ $monthcomp->count() }} Clints</span> Last Month
                </p>
              </div>
              <div class="card-body p-3">
                <div class="timeline timeline-one-side">
                  @foreach ($monthcomp as $item)  
                  <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="material-icons text-success text-gradient">featured_play_list</i>
                    </span>
                    <div class="timeline-content">
                      <a href="{{url('details-company/'.$item->id)}}">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $item->name }}</h6>
                      </a>
                        <p class="text-secondary font-weight-bold text-md mt-1 mb-0">{{ $item->slug }}</p>
                        <span class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $item->created_at }}</span>
                    </div>
                  </div>
                  <hr>
                  @endforeach
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
@endsection


