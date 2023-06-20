@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            @foreach(\App\Models\UserCongratulation::ADMIN_FILTERS as $filterName => $filters)
                @if(!empty($filters))
                    <div class="adminFilterItem">
                        <div>
                            {{--<label>--}}
                            {!! strtoupper(\App\Services\DataService::getFilterLang($filterName)) !!}
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
                                        {!! \App\Services\DataService::getFilterLang($key) !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="adminFilterItem adminFilterDatepicker">
                <input type="text"
                       class="form-control input adminReviewdatepicker"
                       name="from"
                       required
                       placeholder="{{ __('service/profile.from') }}"
                       value="{{ empty($paginateParams['from']) ? old('from') : $paginateParams['from'] }}"
                       autocomplete="off">
                <input type="hidden"
                       id="adminDatepickerDifMinRange"
                       value="{{ \App\Services\UserCongratulationService::difToMinRangeDate() }}">
                <input type="text"
                       class="form-control input adminReviewdatepicker"
                       name="to"
                       required
                       value="{{ empty($paginateParams['to']) ? old('to') : $paginateParams['to'] }}"
                       placeholder="{{ __('service/profile.to') }}"
                       autocomplete="off">
                <input type="hidden"
                       id="adminDatepickerDifMaxRange"
                       value="{{ \App\Services\UserCongratulationService::difToMaxRangeDate() }}">
            </div>
            <button class="btn btn-outline-primary my-md-2 adminFilterButton">@lang('service/index.filter')</button>
            <form method="GET"
                  action="{{ route('admin.searchUserCongratulations') }}"
                  class="form-inline search-form"
                  novalidate=""
                  id="searchForm">
                <input class="form-control mr-sm-2 input"
                       id="searchCategory"
                       type="text"
                       name="search"
                       placeholder="{!! __('service/index.search') !!}"
                       aria-label="Search"
                       value="{{ isset($paginateParams['search']) ? $paginateParams['search'] : '' }}"
                       required>
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">@lang('service/index.go')</button>
            </form>
        </div>
        @forelse($congratulations as $congratulation)
            @include('admin.includes.single_congratulation')
        @empty
            <span>@lang('service/index.empty_congratulations')</span>
        @endforelse
        @if($congratulations->total() > $congratulations->count())
            <div class="pagination-container">
                {{ $congratulations->appends($paginateParams)->links() }}
            </div>
        @endif
    </div>
@endsection
