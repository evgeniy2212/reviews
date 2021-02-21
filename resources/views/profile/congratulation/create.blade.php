@extends('profile.index')

@section('profile_review_content')
    <form method="POST" action="{{ route('profile-congratulations.store') }}" enctype="multipart/form-data" novalidate="" id="congratulationForm">
        @csrf
        <div class="congratulationTitle">
            <span>@lang('service/profile.congratulation.create.title')</span>
        </div>
        <div class="congratulation-info-container">
            @include('profile.congratulation.user_info_inputs')
        </div>
        <div class="congratulation-info-container">
            @include('profile.congratulation.congratulation_info_inputs')
        </div>
        <div class="create-congratulation-media">
            <div class="congratulationContentContainer">
                <textarea name="review"
                          class="form-control"
                          type="text"
                          required
                          placeholder="@lang('service/index.review_text_placeholder')"></textarea>
                <div class="congratulationContentUpload">
                    <label class="create-congratulation-image">
                        <input type="file"
                               id="imgCongratulation"
                               name="img"
                               class="form-control input"
                               data-src=""
                               accept="image/*"/>
                        <i class="fa fa-cloud-upload"></i>
                        <span data-placeholder="{{ __('service/profile.congratulation.create.add_image') }}">
                            @lang('service/profile.congratulation.create.add_image')
                        </span>
                    </label>
                    <label class="create-congratulation-image">
                        <input type="file"
                               id="videoCongratulation"
                               name="video[]"
                               accept="video/*">
                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/profile.congratulation.create.add_video')</span>
                    </label>
                    <label class="create-congratulation-image">
                        <input type="button"
                               style="opacity: 0;"
                               id="imgDefaultCongratulation"
                               name="img_default">
                        <input type="hidden"
                               id="imgDefaultCongratulationValue"
                               name="img_default">
                        <i class="fa fa-cloud-upload"></i> <span>@lang('service/profile.congratulation.create.add_default_image')</span>
                    </label>
                </div>
            </div>
            <div class="congratulationDefaultImagesContainer">
                <div class="congratulationDefaultImages">
                    <div class="congratulationDefaultImagePreview" id="test">
                        <img src="{{ asset('images/logo_new.jpg') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                    <div class="congratulationDefaultImagePreview">
                        <img src="{{ asset('images/default_banner.png') }}" alt="your image" />
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-center" style="width: 100%">
                    <div class="col-md-3">
                        <a type="button" id="imgDefaultCongratulationSave" class="otherButton">
                            Save
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a type="button" id="imgDefaultCongratulationClose" class="otherButton">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
            <div class="congratulationControlContainer">
                <div class="congratulationImagePreviewContainer">
                    <div id="congratulationImagePreview">
                        <img id="blah"
                             src="{{ asset('images/default_banner.png') }}"
                             data-src="{{ asset('images/default_banner.png') }}"
                             data-default-src="{{ asset('images/default_banner.png') }}"
                             alt="your image" />
                    </div>
                </div>
                <div class="congratulationImagePreviewContainer">
                    <img src="{{ asset('storage/images/default_img_video.png') }}"
                         alt="photo"
                         class="videoPreview">
                    <video controls class="congratulationVideoPreview">
                        <source src="" id="videoPreview">
                        Your browser does not support HTML5 video.
                    </video>
                </div>
            </div>
        </div>
        <div class="create-congratulation-name">
            <div class="col-md-4">
                <input type="radio"
                       class="custom-radio"
                       id="name1"
                       name="user_sign"
                       value="{{ \App\Models\User::NAME_SIGN }}"
                       checked>
                <label for="name1">{{ auth()->user()->full_name }}</label>
            </div>
            <div class="col-md-4">
                <input type="radio"
                       class="custom-radio"
                       id="name2"
                       name="user_sign"
                       value="{{ \App\Models\User::NICKNAME_SIGN }}"
                       @empty(auth()->user()->nickname) disabled @endempty>
                <label for="name2">{{ empty(auth()->user()->nickname) ? __('service/index.review_nickname') : auth()->user()->nickname }}</label>
            </div>
            <div class="col-md-4">
                <input type="radio"
                       class="custom-radio"
                       id="name3"
                       name="user_sign"
                       value="{{ \App\Models\User::DEFAULT_SIGN }}">
                <label for="name3">@lang('service/index.default_nickname')</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center" style="width: 100%">
            <div class="col-md-3">
                <button type="submit" id="congratulationButton" class="otherButton submitCongratulationButton">
                    Publish
                </button>
            </div>
            <div class="col-md-3">
                <a role="button" href="{{ route('profile-congratulations.create') }}" class="otherButton">
                    Cancel
                </a>
            </div>
        </div>
    </form>
@endsection
