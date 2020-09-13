@extends('profile.index')

@section('profile_review_content')
    <div class="profile-review-place">
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
        </div>
        @foreach($reviews as $review)
            @include('profile.single_review')
        @endforeach
        @if($reviews->total() > $reviews->count())
            <div class="container-fluid">
                <div class="pagination-container">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
