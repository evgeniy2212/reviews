@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
        <div class="adminFilters" style="justify-content: space-around;">
            <div class="adminFilterItem">
                <div>
                    <a class="admin-complain {{ (array_key_exists('is_new', $paginateParams) && $paginateParams['is_new'] === '1')
                                            ? 'active'
                                            : ''}}"
                       name="is_new"
                       value="1">NEW ({!! $newReviewsCnt !!})</a>
                </div>
            </div>
            <div class="adminFilterItem">
                <div>
                    <a class="admin-complain {{ (array_key_exists('is_new', $paginateParams) && $paginateParams['is_new'] === '0')
                                            ? 'active'
                                            : ''}}"
                       name="is_new"
                       value="0">PROCESSED ({!! $processedReviewsCnt !!})</a>
                </div>
            </div>
            <div class="adminFilterItem">
                <div>
                    <a class="admin-complain {{ ((array_key_exists('is_new', $paginateParams) && $paginateParams['is_new'] === 'NULL') || !array_key_exists('is_new', $paginateParams))
                                            ? 'active'
                                            : ''}}"
                       name="is_new"
                       value="NULL">ALL ({!! $allReviewsCnt !!})</a>
                </div>
            </div>
        </div>
        @forelse($reviews as $review)
            @include('admin.includes.single_complain_review')
        @empty
            <span>Complains is EMPTY.</span>
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
