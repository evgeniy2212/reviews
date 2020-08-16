@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('save-review') }}" novalidate="" id="createReviewForm">
        @csrf
        <input type="hidden"
               name="review_category_id"
               value="{{ $reviewCategory->id }}">
        <input type="hidden"
               name="category_slug"
               value="{{ $slug }}">
        <div class="container-fluid">
            <div class="container">
                <div class="review-content-place">
                    <div class="d-flex justify-content-center">
                        <span class="create-review-title">
                            @lang(trans('service/index.create_review_title', ['title' => $reviewCategory->title]))
                        </span>
                    </div>
                    <div class="rating-container">
                        <span class="create-review-label">
                            @lang('service/index.review_rating_title')
                        </span>
                        <div class="rating" data-rate-value=5>
                            <input type="hidden"
                                   id="rating"
                                   name="rating"
                                   value="5">
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
                                           value="{{ old('name') }}"
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
                                           value="{{ old('second_name') }}"
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
                                    <select class="select"
                                            id="selectCountry"
                                            name="country"
                                            required>
                                        <option disabled selected value="">@lang(trans('service/index.select_item', ['item' => 'country']))</option>
                                        @foreach($countries as $id => $country)
                                            <option value="{{ $id }}">{!! $country !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <span class="create-review-label" id="registerLabel">
                                        @lang('register.state')
                                    </span>
                                </div>
                                <div class="col-md-3">
                                    <select class="select required"
                                            id="selectRegion"
                                            name="region_id"
                                            disabled
                                            required>
                                        <option selected value="">@lang(trans('service/index.select_item', ['item' => 'region']))</option>
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
                                           value="{{ old('city') }}"
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
                                                   value="{{ $characteristic->id }}">
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
                                      placeholder="@lang('service/index.review_text_placeholder')"></textarea>
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
                                                   value="{{ $characteristic->id }}">
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
                                   name="name"
                                   value="{{ auth()->user()->full_name }}"
                                   checked>
                            <label for="name1">{{ auth()->user()->full_name }}</label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name2"
                                   name="name"
                                   value="{{ auth()->user()->nickname ?? '' }}"
                                   @empty(auth()->user()->nickname) disabled @endempty>
                            <label for="name2">{{ auth()->user()->nickname ?? __('service/index.review_nickname') }}</label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name3"
                                   name="name"
                                   value="">
                            <label for="name3">@lang('service/index.default_nickname')</label>
                        </div>
                    </div>
                    <div class="create-review-buttons">
                        <div class="col-md-2">
                            <button type="submit" class="createReviewButton loginButton submitReviewButton">
                                Save
                            </button>
                        </div>
                        <div class="col-md-2">
                            <a role="button" href="{{ route('profile-info') }}" class="createReviewButton" id="cancelButton">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
