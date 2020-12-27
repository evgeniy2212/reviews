@extends('profile.index')

@section('admin_content')
    <form method="POST" action="{{ route('admin.save_logo', ['review' => $review->id]) }}" enctype="multipart/form-data" novalidate="" id="logoForm">
        @csrf
        <div class="createLogo">
            <div class="createLogoTitle">
                <span>Create logo for the "{{ $review->full_name }}" and the same {{ $review->category->title }}</span>
            </div>
            <div class="createLogoImageContainer">
                <div class="createLogoImagePreviewContainer">
                    <div id="createLogoImagePreview">
                        <img id="blah" src="{{ asset('images/default_img_square.png') }}" alt="your image" />
                    </div>
                    <label class="createLogoFileUpload">
                        <input type="file"
                               id="imgBanner"
                               name="img"
                               class="form-control input"
                               required
                               accept="image/*"/>
                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/profile.upload')</span>
                    </label>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center" style="width: 100%">
                <div class="col-md-3">
                    <button type="submit" id="bannerButton" class="otherButton submitCreateLogoButton">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
