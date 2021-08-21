@extends('profile.index')

@section('modal_forms')
    @include('includes.modal.confirmDeleteComment')
@endsection

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            <div class="adminFilterDatepicker">
                <div class="adminFilterItem">
                    <input type="text"
                           class="form-control input adminReviewdatepicker"
                           name="from"
                           required
                           placeholder="{{ __('service/profile.from') }}"
                           value="{{ empty($paginateParams['from']) ? old('from') : $paginateParams['from'] }}"
                           autocomplete="off">
                    <input type="hidden"
                           id="adminDatepickerDifMinRange"
                           value="{{ \App\Services\CommentService::difToMinRangeDate() }}">
                    <input type="text"
                           class="form-control input adminReviewdatepicker"
                           name="to"
                           required
                           value="{{ empty($paginateParams['to']) ? old('to') : $paginateParams['to'] }}"
                           placeholder="{{ __('service/profile.to') }}"
                           autocomplete="off">
                    <input type="hidden"
                           id="adminDatepickerDifMaxRange"
                           value="{{ \App\Services\CommentService::difToMaxRangeDate() }}">
                </div>
                <button
                    class="btn btn-outline-primary my-md-0 adminFilterButton"
                    style="max-height: 100%">Sort</button>
            </div>
            <form method="GET"
                  action="{{ route('searchUserComments') }}"
                  class="form-inline search-form"
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
        @forelse($comments as $comment)
            @include('profile.single_comment')
        @empty
            <span>Review is EMPTY.</span>
        @endforelse
        @if($comments->total() > $comments->count())
            <div class="container-fluid">
                <div class="pagination-container">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        {{ $comments->appends($paginateParams)->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
