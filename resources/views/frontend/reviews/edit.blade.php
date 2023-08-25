
@extends('layouts.front')

@section('title', "edit your Review")

@section('content')

<div class="container">
    <div class="row m-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body m-5">
                    <h5>You are Writing a Review For {{ $review->product->name }}</h5>
                    <form action="/update-review" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                        <textarea name="user_review" required rows="5" class="form-control">{{ $review->user_review}}</textarea>
                        <button class="btn btn-primary m-3" type="submit"> update Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
