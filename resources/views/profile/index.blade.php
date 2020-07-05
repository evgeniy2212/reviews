@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place profile-content-place d-flex flex-row justify-content-between">
                <div class="profile-navigation d-flex flex-column justify-content-between align-items-center">
                    <ul>
                        <li class="{{ Request::url() == route('profile-info') ? 'active' : '' }}">
                            <a href="{{ route('profile-info') }}">
                                <span>@lang('service/index.personal_info')</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile-info') }}">
                                <span>@lang('service/index.your_reviews')</span>
                            </a>
                        </li>
                        <li>
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
                        {{--<div class="d-flex flex-row justify-content-start">--}}
                        {{--<div class="d-flex flex-column justify-content-center">--}}
                        {{--{{ dd(session()->all()) }}--}}
                        @if($errors->any())
                            <div class="errorMessage">{!! $errors->first() !!}</div>
                        @elseif (session('status'))
                            <div class="successMessage">{!! session('status') !!}</div>
                        @endif
                        @yield('profile_content')
                    </div>
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
