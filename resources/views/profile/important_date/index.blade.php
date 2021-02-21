@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        @include('profile.important_date.add_important_date')
        <div class="profile-important-date-filters">
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
                                //todo change to better solution
                                @if($value->slug !== 'rating')
                                    <option value="{!! $value->slug !!}"
                                        {{ (array_key_exists($filter->slug, $paginateParams) && $paginateParams[$filter->slug] === $value->slug)
                                            ? 'selected'
                                            : ''}}>
                                        {!! $value->format_value !!}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="profile-important-date-control">
            <button type="submit"
                    id="deleteImportantDates"
                    disabled
                    class="otherButton">@lang('service/index.delete')</button>
        </div>
        @foreach($importantDates as $importantDate)
            @include('profile.important_date.single_important_date')
        @endforeach
        @if($importantDates->total() > $importantDates->count())
            <div class="container-fluid">
                <div class="pagination-container">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        {{ $importantDates->appends($importantDates)->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
