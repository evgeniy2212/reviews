@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters">
            @foreach(\App\Models\Review::ADMIN_FILTERS as $filterName => $filters)
                <div class="adminFilterItem">
                    <div>
                        <label for="userFilter">
                            {!! strtoupper($filterName) !!}
                        </label>
                    </div>
                    <div>
                        <select class="select admin-filter-select"
                                id="userFilter-{!! $filterName !!}"
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
            @endforeach
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
