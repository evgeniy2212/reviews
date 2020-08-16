@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place">
                <div class="review-filters">
                    <div class="col-md-3 d-flex flex-row justify-content-around">
                        <div>
                            <label for="country">
                                Filter by Date
                            </label>
                        </div>
                        <div>
                            <select class="select"
                                    id=""
                                    name="date">
                                <option disabled selected>2020</option>
                                <option disabled selected>2019</option>
                                <option disabled selected>2018</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex flex-row justify-content-around">
                        <div>
                            <label for="country">
                                Sort by
                            </label>
                        </div>
                        <div>
                            <select class="select"
                                    id=""
                                    name="sort">
                                <option disabled selected>Alphabet</option>
                                <option disabled selected>Stars</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a role="button" href="{{ route('create-review', ['review_item' => $slug]) }}" class="createReviewButton" id="cancelButton">
                            Create Review
                        </a>
                    </div>
                </div>
                @foreach($reviews as $review)
                    @include('reviews.single_review')
                @endforeach
                @if($reviews->total() > $reviews->count())
                    <div class="container-fluid">
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-12 d-flex justify-content-center pagination pagination-template">
                                {{ $reviews->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
