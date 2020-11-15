@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            @foreach(\App\Models\Review::ADMIN_FILTERS as $filterName => $filters)
                @if(!empty($filters))
                    <div class="adminFilterItem">
                        <div>
                            {{--<label>--}}
                            {!! strtoupper($filterName) !!}
                            {{--</label>--}}
                        </div>
                        <div>
                            <select class="select"
                                    id="reviewFilter-{!! $filterName !!}"
                                    name="{!! $filterName !!}">
                                @foreach($filters as $key => $value)
                                    <option value="{!! $key !!}"
                                            {{ (array_key_exists($filterName, $paginateParams) && $paginateParams[$filterName] === $key)
                                                ? 'selected'
                                                : ''}}
                                    >
                                        {!! $key !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="adminFilterItem adminFilterDatepicker">
                <input type="text"
                       class="form-control input datepicker"
                       name="from"
                       required
                       placeholder="start date"
                       value="{{ empty($paginateParams['from']) ? old('from') : $paginateParams['from'] }}"
                       autocomplete="off">
                <input type="hidden"
                       id="adminDatepickerDifMinRange"
                       value="{{ \App\Services\ReviewService::difToMinRangeDate() }}">
                <input type="text"
                       class="form-control input datepicker"
                       name="to"
                       required
                       value="{{ empty($paginateParams['to']) ? old('to') : $paginateParams['to'] }}"
                       placeholder="end date"
                       autocomplete="off">
                <input type="hidden"
                       id="adminDatepickerDifMaxRange"
                       value="{{ \App\Services\ReviewService::difToMaxRangeDate() }}">
            </div>
            <button class="btn btn-outline-primary my-2 my-sm-0 adminFilterButton">Filter</button>
            <form method="GET"
                  action="{{ route('admin.searchReviews') }}"
                  class="form-inline"
                  novalidate=""
                  id="searchForm">
                <input class="form-control mr-sm-2 input"
                       id="searchCategory"
                       type="text"
                       name="search"
                       placeholder="Search"
                       aria-label="Search"
                       value="{{ isset($paginateParams['search']) ? $paginateParams['search'] : '' }}"
                       required>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Go</button>
            </form>
        </div>
        @forelse($reviews as $review)
            @include('admin.includes.single_review')
        @empty
            <span>Review is EMPTY.</span>
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
@endsection
