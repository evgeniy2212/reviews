@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place">
                <div class="create-review-button">
                    <span>
                        WRITE A NEW REVIEW
                    </span>
                    <div class="col-md-2">
                        <a role="button" href="{{ route('create-review', ['review_item' => $slug]) }}" class="createReviewButton" id="cancelButton">
                            Start
                        </a>
                    </div>
                </div>
                <div class="review-items">
                    <div class="d-flex flex-row justify-content-center exist-review-title">
                        <span>
                            EXISTING REVIEWS
                        </span>
                    </div>
                    <div class="review-filters">
                        @foreach($filters as $filter)
                            <div class="col-md-3 d-flex flex-row justify-content-around">
                                <div>
                                    <label for="country">
                                        {!! $filter->format_name !!}
                                    </label>
                                </div>
                                <div>
                                    <select class="select filter-select"
                                            id="filter-{!! $filter->slug !!}"
                                            name="{!! $filter->slug !!}">
                                        <option value="" selected>All</option>
                                        @foreach($filter->filter_values as $value)
                                            <option value="{!! $value->slug !!}"
                                                    {{ (array_key_exists($filter->slug, $paginateParams) && $paginateParams[$filter->slug] === $value->slug)
                                                        ? 'selected'
                                                        : ''}}>
                                                {!! $value->format_value !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @foreach($reviews as $review)
                        @include('reviews.single_review')
                    @endforeach
                    @if($reviews->total() > $reviews->count())
                        <div class="container-fluid">
                            <div class="pagination-container">
                                <div class="col-md-12 d-flex align-items-center justify-content-center">
                                    {{ $reviews->appends($paginateParams)->links() }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
