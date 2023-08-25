@extends('layouts.front')

@section('title')
    My Orders
@endsection
@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="card">
                @if ($orders->count() > 0)
                    <div class="card-header bg-primary">
                        <h3>My Orders</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
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
                                        <td><a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">View</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="container my-2">
                        <div class="card-bady text-center">
                            <h2> your <i class="fa fa-shopping-cart"></i> Orders is Empty</h2>
                            <a href="{{ url('category')}}" class="btn btn-primary float-end">Continue Shopping</a>
                        </div>
                    </div>
                    @endif
            </div>
        </div>
    </div>
@endsection
