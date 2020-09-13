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
                        @include('reviews.review_inputs.' . $slug)
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-md-4 text-center offset-md-4">
                            <span class="review-character-label">
                                @lang('service/index.review_positive_character')
                            </span>
                        </div>
                        <div class="col-md-4 text-center">
                            <span class="review-character-label">
                                @lang('service/index.review_negative_character')
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
                                   name="user_sign"
                                   value="{{ \App\User::NAME_SIGN }}"
                                   checked>
                            <label for="name1">{{ auth()->user()->full_name }}</label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name2"
                                   name="user_sign"
                                   value="{{ \App\User::NICKNAME_SIGN }}"
                                   @empty(auth()->user()->nickname) disabled @endempty>
                            <label for="name2">{{ auth()->user()->nickname ?? __('service/index.review_nickname') }}</label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio"
                                   class="custom-radio"
                                   id="name3"
                                   name="user_sign"
                                   value="{{ \App\User::DEFAULT_SIGN }}">
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
