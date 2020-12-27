@extends('layouts.app')

@section('modal_forms')
    @include('includes.modal.complainModal')
@endsection

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
                    @if($reviews->count())
                        <div class="d-flex flex-row justify-content-center exist-review-title">
                            <span>
                               {{ empty($search) ? '' : "\"$search\"" }} EXISTING REVIEWS
                            </span>
                        </div>
                        @if(!empty($avgRating))
                            <div class="d-flex flex-row justify-content-center">
                                <div class="middle-rating-star" data-rate-value="5" style="width: 91.6406px; height: 33px; position: relative; cursor: default; user-select: none;">
                                    <div class="rate-base-layer" style="width: 100%; height: 33px; overflow: hidden; position: absolute; top: 0px; display: block; white-space: nowrap;">
                                        <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                    </div>
                                    <div class="rate-select-layer" style="width: {!! $starPercent !!}%; height: 33px; overflow: hidden; position: absolute; top: 0px; display: block; white-space: nowrap;">
                                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                    @else
                        <div class="d-flex flex-row justify-content-center exist-review-title">
                            <span>
                                SEARCH RESULT IS EMPTY
                            </span>
                        </div>
                    @endif
                    @forelse($reviews as $review)
                        @include('reviews.single_review')
                    @empty

                    @endforelse
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
