@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place d-flex flex-row justify-content-center">
                <div class="container loginForm">
                    {{--<div >--}}
                        {{--<div >--}}
                            {{--<div >{{ __('Login') }}</div>--}}
                            <div >
                                <div class="text-center">@lang('service/index.welcome')</div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group d-flex flex-row justify-content-center">
                                        <label for="email">@lang('service/index.email_enter')</label>

                                        {{--<div class="col-md-6">--}}
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        {{--</div>--}}
                                    </div>

                                    <div class="form-group d-flex flex-row justify-content-center">
                                        <label for="password">@lang('service/index.password_enter')</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div class="form-group d-flex flex-row justify-content-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        <button type="submit" class="loginButton">
                                            Sign In
                                        </button>
                                        <a href="{{ route('home') }}" type="btn" class="loginButton">Cancel</a>
                                        {{--<div class="form-group">--}}
                                            {{--<div class="col-md-8 offset-md-4">--}}
                                                {{--<button type="submit" class="loginButton">--}}
                                                    {{--Sign In--}}
                                                {{--</button>--}}
                                                {{--<a href="{{ route('home') }}" type="button" class="loginButton">Cancel</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </form>
                            </div>
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
