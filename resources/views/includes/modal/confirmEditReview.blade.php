@extends('profile.index')

@section('form_content')
    <form action="{{ route("profile-reviews.update", ":id") }}" id="editReviewForm" method="post">
        <div>
            {{ csrf_field() }}
            @method('PATCH')
            <p >Are you sure you want to <b>EDIT</b></p>
            <p>"<span id="reviewName"></span>" review?</p>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-3">
                <button class="otherButton" type="button" data-dismiss="modal">
                    No
                </button>
            </div>
            <div class="col-md-3">
                <button class="otherButton" id="confirmReviewButton" name="" data-dismiss="modal">
                    Yes
                </button>
            </div>
        </div>
    </form>
@endsection
