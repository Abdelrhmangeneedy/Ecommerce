@extends('layouts.front')

@section('title')
    Example Categories
@endsection
@section('content')
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>All Category</h1>
                        <div class="row">
                            @foreach ($category as $item)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ url('view-category/'.$item->name) }}">
                                    <div class="card">
                                        <img src="{{ asset('assets/uploads/category/'.$item->image) }} " class="image" alt="Category image">
                                        <div class="card-body">
                                            <h5>{{ $item->name }}</h5>
                                            <p>{{ $item->description }}</p>
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
