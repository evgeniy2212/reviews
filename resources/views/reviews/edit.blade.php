@extends('layouts.app')

@section('script_section')
    <script src="http://lonekorean.github.io/highlight-within-textarea/jquery.highlight-within-textarea.js"></script>
@endsection

@section('style_section')
    <link rel="stylesheet" href="http://lonekorean.github.io/highlight-within-textarea/jquery.highlight-within-textarea.css">
@endsection

@section('modal_forms')
    @include('includes.modal.twentyoneYearAccept')
    @include('includes.modal.errorBadWords')
@endsection

@section('content')
    <form method="POST" action="{{ route('profile-reviews.update', $review->id) }}" enctype="multipart/form-data" novalidate="" id="editReviewForm">
        @method('PATCH')
        @csrf
        <input type="hidden"
               name="review_category_id"
               value="{{ $review->category->id }}">
        <input type="hidden"
               name="category_slug"
               value="{{ $review->category->slug }}">
        <input type="hidden"
               name="submitFormAccept"
               id="submitFormAccept"
               value="1">
        <div class="container-fluid">
            <div class="container">
                <div class="review-content-place">
                    <div class="d-flex justify-content-center">
                        <span class="create-review-title">
                            @lang(trans('service/index.edit_review_title', ['title' => $review->category->title]))
                        </span>
                    </div>
                    <div class="rating-container">
                        <span class="create-review-label">
                            @lang('service/index.review_rating_title')
                        </span>
                        <div class="rating" data-rate-value={{ $review->rating }}>
                            <input type="hidden"
                                   id="rating"
                                   name="rating"
                                   value="{{ $review->rating }}">
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center review-info-container">
                        <div class="col-md-5">
                            <div class="d-flex flex-row align-items-center flex-grow-1">
                                <div class="col-md-3">
                                    <span class="create-review-label text-center">
                                        @lang('service/index.review_person_name_label')
                                    </span>
                                </div>
                                <div>
                                    <input id="name"
                                           type="text"
                                           class="form-control input"
                                           name="name"
                                           minlength="3"
                                           value="{{ $review->name ?? old('name') }}"
                                           placeholder="@lang('register.first_name')"
                                           required
                                           autocomplete="name">
                                </div>
                                <div>
                                    <input id="second_name"
                                           type="text"
                                           class="form-control input"
                                           name="second_name"
                                           minlength="3"
                                           value="{{ $review->second_name ?? old('second_name') }}"
                                           placeholder="@lang('register.last_name')"
                                           required
                                           autocomplete="second_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="d-flex flex-row align-items-center flex-grow-1">
                                <div>
                                    <span class="create-review-label">
                                        @lang('register.country')
                                    </span>
                                </div>
                                <div class="col-md-3">
                                    {{--<select class="select"--}}
                                            {{--id="selectCountry"--}}
                                            {{--name="country"--}}
                                            {{--required>--}}
                                        {{--<option disabled selected>{{ $review->region->country->country }}</option>--}}
                                        {{--@foreach($countries as $id => $country)--}}
                                            {{--<option value="{{ $id }}">{!! $country !!}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                </div>
                                {{--<div>--}}
                                    {{--<span class="create-review-label" id="registerLabel">--}}
                                        {{--{{ $review->region->region_naming }}--}}
                                    {{--</span>--}}
                                {{--</div>--}}
                                <div class="col-md-3">
                                    <select class="select required"
                                            id="selectRegion"
                                            name="region_id"
                                            disabled
                                            required>
                                        <option selected disabled>{{ $review->region->region }}</option>
                                        <option value="1">@lang('service/index.person')</option>
                                        <option value="2">@lang('service/index.company')</option>
                                        <option value="3">@lang('service/index.goods')</option>
                                        <option value="3">@lang('service/index.vacations')</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input id="city"
                                           type="text"
                                           class="form-control input"
                                           name="city"
                                           minlength="3"
                                           value="{{ $review->city ?? old('city') }}"
                                           required
                                           placeholder="@lang('register.city_town')"
                                           autocomplete="city">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-md-4 text-center">
                            <span class="review-character-label">
                                @lang('service/index.review_negative_character')
                            </span>
                        </div>
                        <div class="col-md-4 text-center offset-md-4">
                            <span class="review-character-label">
                                @lang('service/index.review_positive_character')
                            </span>
                        </div>
                    </div>
                    <div class="review-characteristics">
                        <div class="col-md-4 checkbox-container">
                            @foreach($positiveCharacteristics as $characteristics)
                                <div class="col-md-6 checkbox-items">
                                    @foreach($characteristics as $characteristic)
                                        <div class="checkbox-item">
                                            <input type="checkbox"
                                                   class="custom-checkbox"
                                                   id="positive-{{ $characteristic->id }}"
                                                   name="characteristics[]"
                                                   value="{{ $characteristic->id }}"
                                                   {{ $checkedCharacteristics->contains($characteristic->id) ? 'checked' : '' }}>
                                            <label for="positive-{{ $characteristic->id }}">{!! $characteristic->name !!}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <textarea name="review"
                                      type="text"
                                      id="review-text"
                                      placeholder="{{ empty($review->review) ? __('service/index.review_text_placeholder') : '' }}">{!! $review->review !!}</textarea>
                            <div class="review-upload-files">
                                <label class="custom-file-upload">
                                    <input type="file"
                                           id="img"
                                           name="img"
                                           accept="image/*"/>
                                    <i class="fa fa-cloud-upload"></i> <span>{!! empty($review->image) ? __('service/index.add_photo') : $review->image->original_name !!}</span>
                                </label>
                                <label class="custom-file-upload">
                                    <input type="file"
                                           name="video"
                                           id="video"
                                           accept="video/*"/>
                                    <i class="fa fa-cloud-upload"></i> <span>{!! empty($review->video) ? __('service/index.add_video') : $review->video->original_name !!}</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 checkbox-container">
                            @foreach($negativeCharacteristics as $characteristics)
                                <div class="col-md-6 checkbox-items">
                                    @foreach($characteristics as $characteristic)
                                        <div class="checkbox-item">
                                            <input type="checkbox"
                                                   class="custom-checkbox"
                                                   id="negative-{{ $characteristic->id }}"
                                                   name="characteristics[]"
                                                   value="{{ $characteristic->id }}"
                                                   {{ $checkedCharacteristics->contains($characteristic->id) ? 'checked' : '' }}>
                                            <label for="negative-{{ $characteristic->id }}">{!! $characteristic->name !!}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="create-review-name">
                        <div class="col-md-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name1"
                                   name="user_sign"
                                   value="{{ \App\User::NAME_SIGN }}"
                                   {{ $review->user_sign == \App\User::NAME_SIGN ? 'checked' : '' }}>
                            <label for="name1">{{ auth()->user()->full_name }}</label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name2"
                                   name="user_sign"
                                   value="{{ \App\User::NICKNAME_SIGN }}"
                                   {{ $review->user_sign == \App\User::NICKNAME_SIGN ? 'checked' : '' }}
                                   @empty(auth()->user()->nickname) disabled @endempty>
                            <label for="name2">{{ auth()->user()->nickname ?? __('service/index.review_nickname') }}</label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name3"
                                   name="user_sign"
                                   {{ $review->user_sign == \App\User::DEFAULT_SIGN ? 'checked' : '' }}
                                   value="{{ \App\User::DEFAULT_SIGN }}">
                            <label for="name3">@lang('service/index.default_nickname')</label>
                        </div>
                    </div>
                    <div class="edit-review-buttons">
                        <div class="col-md-2">
                            <button data-toggle="modal"
                               type="submit"
                               id="editReview"
                               class="loginButton">
                                Save
                            </button>
                        </div>
                        <div class="col-md-2">
                            <a role="button" href="{{ route('profile-reviews.index') }}" class="" id="cancelButton">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
