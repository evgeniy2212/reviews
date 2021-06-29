@extends('profile.index')

@section('profile_message_content')
    <div class="profile-review-place">
        @foreach($reviews as $review)
            @include('profile.single_message')
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
@section('modal_forms')
    @include('includes.modal.confirmDeleteMessage')
@endsection
