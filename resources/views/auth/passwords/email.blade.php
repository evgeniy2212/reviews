@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place d-flex flex-column justify-content-center align-items-center">
                <div class="container loginForm">
                    @if (session('success'))
                        <div class="successMessage">{!! session('success') !!}</div>
                        <div class="form-group d-flex flex-row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <a role="button" href="{{ route('home') }}" id="cancelButton">
                                    @lang('service/index.close')
                                </a>
                            </div>
                        </div>
                    @elseif(session('status'))
                        <div class="errorMessage">{!! session('status') !!}</div>
                        <div class="form-group d-flex flex-row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <a role="button" href="{{ route('home') }}" id="cancelButton">
                                    @lang('service/index.close')
                                </a>
                            </div>
                        </div>
                    @elseif($errors->any())
                        <div class="errorMessage">{!! $errors->first() !!}</div>
                        <form method="POST" action="{{ route('password.email') }}" novalidate="" id="loginForm">
                            @csrf
                            <div class="form-group d-flex flex-row align-items-center">
                                <div class="col-md-3 text-right">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="email"
                                           type="email"
                                           class="form-control input"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required autocomplete="email">
                                    <div class="invalid-feedback">Please fill out this field with correct Email.</div>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <div class="col-md-6">
                                    {!! NoCaptcha::renderJs('en') !!}
                                    {!! NoCaptcha::display(['data-size' => 'normal']) !!}
                                    {{--@if ($errors->has('g-recaptcha-response'))--}}
                                    {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                            <div class="form-group d-flex flex-row justify-content-center align-items-center">
                                <div class="col-md-3">
                                    <button type="submit" name="remember" value="1" class="rememberButton submitLoginButton">
                                        @lang('service/index.continue')
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="headFormName">@lang('service/index.forgot_password_question')</div>
                        <div class="headFormDescription">@lang('service/index.enter_email')</div>
                        <form method="POST" action="{{ route('password.email') }}" novalidate="" id="loginForm">
                            @csrf
                            <div class="form-group d-flex flex-row align-items-center">
                                <div class="col-md-3 text-right">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="email"
                                           type="email"
                                           class="form-control input"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required autocomplete="email">
                                    <div class="invalid-feedback">Please fill out this field with correct Email.</div>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center">
                                <div class="col-md-6">
                                    {!! NoCaptcha::renderJs('en') !!}
                                    {!! NoCaptcha::display(['data-size' => 'normal']) !!}
                                    {{--@if ($errors->has('g-recaptcha-response'))--}}
                                    {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                </div>
                            </div>
                            <div class="form-group d-flex flex-row justify-content-center align-items-center">
                                <div class="col-md-3">
                                    <button type="submit" name="remember" value="1" class="rememberButton submitLoginButton">
                                        @lang('service/index.continue')
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
