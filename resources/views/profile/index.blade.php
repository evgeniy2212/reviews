@extends('layouts.app')

@section('style_section')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place profile-content-place d-flex flex-row justify-content-between">
                <div class="profile-navigation">
                    <ul>
                        <li class="{{ Request::url() == route('profile-info') ? 'active' : '' }}">
                            <a href="{{ route('profile-info') }}">
                                <span>@lang('service/index.personal_info')</span>
                            </a>
                        </li>
                        <li class="{{ Request::url() == route('profile-reviews.index') ? 'active' : '' }}">
                            <a href="{{ route('profile-reviews.index') }}">
                                <span>@lang('service/index.your_reviews')</span>
                            </a>
                        </li>
                        <li class="{{ Request::url() == route('profile-info') ? 'active' : '' }}">
                            <a href="{{ route('profile-info') }}">
                                <span>@lang('service/index.mail')</span>
                            </a>
                        </li>
                    </ul>
                    <div style="width: 100px;">
                        <a role="button" href="{{ route('home') }}" id="cancelButton">
                            @lang('service/index.close')
                        </a>
                    </div>
                </div>
                <div class="profile-place">
                    <div class="d-flex flex-column justify-content-center">
                        @if($errors->any())
                            <div class="errorMessage">{!! $errors->first() !!}</div>
                        @elseif (session('status'))
                            <div class="successMessage">{!! session('status') !!}</div>
                        @endif
                        @yield('profile_content')
                    </div>
                    @yield('profile_review_content')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal_forms')
    @include('includes.confirmDeleteReview')
@endsection

@section('script_section')
    <script src="{{ asset('js/profile.js') }}"></script>
@endsection
