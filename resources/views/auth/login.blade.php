@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place d-flex flex-column justify-content-center align-items-center">
                <div class="container loginForm">
                    @if($errors->any())
                        <div class="errorMessage">{!! $errors->first() !!}</div>
                    @else
                        <div class="headFormName">@lang('service/index.welcome')</div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" novalidate="" id="loginForm">
                        @csrf
                        <div class="form-group d-flex flex-row align-items-center">
                            <div class="col-md-3">
                                <label for="email">@lang('service/index.email_enter')</label>
                            </div>
                            <div class="col-md-6">
                                <input id="email"
                                       type="email"
                                       class="form-control input"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autocomplete="email">

                                {{--<div class="invalid-feedback">Please fill out this field.</div>--}}
                                {{--@error('email')--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $message }}</strong>--}}
                                {{--</span>--}}
                                {{--@enderror--}}
                            </div>
                        </div>

                        <div class="form-group d-flex flex-row align-items-center">
                            <div class="col-md-3">
                                <label for="password">@lang('service/index.password_enter')</label>
                            </div>
                            <div class="col-md-6">
                                <input id="password"
                                       type="password"
                                       class="form-control input"
                                       name="password"
                                       required autocomplete="current-password">

                                {{--@error('password')--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $message }}</strong>--}}
                                {{--</span>--}}
                                {{--@enderror--}}
                            </div>
                            <div class="col-md-3">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="col-md-6">
                                {!! NoCaptcha::renderJs('en') !!}
                                {!! NoCaptcha::display(['data-size' => 'normal']) !!}
                            </div>
                        </div>
                        <div class="form-group d-flex flex-row justify-content-center align-items-center">
                            <div class="col-md-3">
                                <button type="submit" class="loginButton submitLoginButton">
                                    Sign In
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="remember" value="1" class="rememberButton submitLoginButton">
                                    Sign In and remember me
                                </button>
                            </div>
                            <div class="col-md-3">
                                <a role="button" href="{{ route('home') }}" id="cancelButton">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container" id="createAccount">
                    <a role="button" href="{{ route('home') }}">
                        Create a new account
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

