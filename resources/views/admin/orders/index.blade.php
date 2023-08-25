@extends('layouts.admin')
@section('title')
    Orders
@endsection
@section('content')

<div class="row pt-4 p-2">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h4 class="text-white text-capitalize ps-3">New Orders
                <a href="{{ 'order-history' }}" class=" btn btn-warning  float-end me-3">order historey</a>
            </h4>
          </div>
        </div>
        <div class="card-body px-0 pb-2 m-2">
          <div class="table-responsive p-0">
            <table class="table table-bordered align-items-center mb-0 text-center">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td>{{ date('d-m-y', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->tracking_no }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->status == '0' ?'panding' : 'completed'}}</td>
                            <td><a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
