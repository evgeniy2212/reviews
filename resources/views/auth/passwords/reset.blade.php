@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Reset Password') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('password.update') }}">--}}
                        {{--@csrf--}}

                        {{--<input type="hidden" name="token" value="{{ $token }}">--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}

                                {{--@error('email')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

                                {{--@error('password')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                {{--@enderror--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Reset Password') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
<div class="container-fluid">
    <div class="container">
        <div class="content-place d-flex flex-column justify-content-center align-items-center">
            <div class="container loginForm">
                @if($errors->any())
                    <div class="errorMessage">{!! $errors->first() !!}</div>
                @else
                    <div class="headFormName">{{ __('Reset Password') }}</div>
                @endif
                <form method="POST" action="{{ route('password.update') }}" novalidate="" id="loginForm">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
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
                        </div>
                    </div>
                    <div class="form-group d-flex flex-row align-items-center">
                        <div class="col-md-3">
                            <label for="password-confirm">@lang('register.confirm_password')</label>
                        </div>
                        <div class="col-md-6">
                            <input id="password-confirm"
                                   type="password"
                                   class="form-control input"
                                   name="password_confirmation"
                                   required autocomplete="new-password">
                        </div>
                    </div>
                    {{--<div class="d-flex flex-row justify-content-center">--}}
                        {{--<div class="col-md-6">--}}
                            {{--{!! NoCaptcha::renderJs('en') !!}--}}
                            {{--{!! NoCaptcha::display(['data-size' => 'normal']) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="form-group d-flex flex-row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <button type="submit" name="remember" value="1" class="rememberButton submitLoginButton">
                                @lang('service/index.reset_password')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
