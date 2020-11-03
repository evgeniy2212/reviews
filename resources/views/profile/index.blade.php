@extends('layouts.app')

@section('style_section')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                        <li class="{{ Request::url() == route('profile-messages') ? 'active' : '' }}">
                            <a href="{{ route('profile-messages') }}">
                                <span>@lang('service/index.mail', ['count' => auth()->user()->getNewMessagesCount()])</span>
                            </a>
                        </li>
                        @if(auth()->user()->is_admin)
                            <li class="{{ Request::url() == route('banners') ? 'active' : '' }}">
                                <a href="{{ route('banners') }}">
                                    <span>@lang('service/index.banners')</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == route('admin.banners.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.banners.index') }}">
                                    <span>@lang('service/admin.banners')</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == route('admin.users.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.users.index') }}">
                                    <span>@lang('service/admin.users')</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == route('admin.reviews.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.reviews.index') }}">
                                    <span>@lang('service/admin.reviews')</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == route('admin.contacts.index') ? 'active' : '' }}">
                                <a href="{{ route('admin.contacts.index') }}">
                                    <span>@lang('service/admin.contacts')</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == route('admin.info_page', 'term_of_service') ? 'active' : '' }}">
                                <a href="{{ route('admin.info_page', 'term_of_service') }}">
                                    <span>@lang('service/admin.term_of_service')</span>
                                </a>
                            </li>
                            <li class="{{ Request::url() == route('admin.info_page', 'privacy_policy') ? 'active' : '' }}">
                                <a href="{{ route('admin.info_page', 'privacy_policy') }}">
                                    <span>@lang('service/admin.privacy_policy')</span>
                                </a>
                            </li>
                        @endif
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
                            {{--<div class="errorMessage">{!! $errors->first() !!}</div>--}}
                        @elseif (session('status'))
                            <div class="successMessage">{!! session('status') !!}</div>
                        @endif
                        @yield('profile_content')
                    </div>
                    @if(auth()->user()->is_admin)
                        @yield('admin_content')
                    @endif
                    @yield('profile_review_content')
                    @yield('profile_message_content')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal_forms')
    @include('includes.modal.confirmDeleteReview')
@endsection

@section('script_section')
    @if(auth()->user()->is_admin)
        <script src="{{ asset('js/admin.js') }}"></script>
    @endif
    <script src="{{ asset('js/profile.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
