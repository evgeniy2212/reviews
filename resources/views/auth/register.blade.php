@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="content-place profile-content-place d-flex flex-column justify-content-center">
                {{--<div class="container">--}}
                @if($errors->any())
                    <div class="errorMessage">{!! $errors->first() !!}</div>
                @endif
                <form method="POST" action="{{ route('register') }}" class="container" novalidate="" id="registerForm">
                    @csrf
                    <div class="registerFormContent">
                        <div class="d-flex flex-column justify-content-around">
                            <div class="d-flex flex-row align-items-center">
                                <div class="col-md-6">
                                    <div class="d-flex flex-row align-items-center registerFields">
                                        <div class="col-md-3">
                                            <label for="name">
                                                @lang('register.first_name')
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input id="name"
                                                   type="text"
                                                   class="form-control input"
                                                   name="name"
                                                   minlength="3"
                                                   value="{{ old('name') }}"
                                                   required
                                                   autocomplete="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-row align-items-center registerFields">
                                        <div class="col-md-2">
                                            <label for="country">
                                                @lang('register.country')
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="select"
                                                    id="selectCountry"
                                                    name="country"
                                                    required>
                                                <option disabled selected>@lang('service/index.head_select')</option>
                                                @foreach($countries as $id => $country)
                                                    <option value="{{ $id }}">{!! $country !!}</option>
                                                @endforeach
                                            </select>
                                            {{--<input id="country"--}}
                                                   {{--type="text"--}}
                                                   {{--class="form-control input"--}}
                                                   {{--name="country"--}}
                                                   {{--required--}}
                                                   {{--autocomplete="country">--}}
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <label for="region" id="registerLabel">
                                                @lang('register.state')
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="select"
                                                    id="selectRegion"
                                                    name="region"
                                                    disabled
                                                    required>
                                                <option disabled selected>@lang('service/index.head_select')</option>
                                                <option value="1">@lang('service/index.person')</option>
                                                <option value="2">@lang('service/index.company')</option>
                                                <option value="3">@lang('service/index.goods')</option>
                                                <option value="3">@lang('service/index.vacations')</option>
                                            </select>
                                            {{--<input id="region"--}}
                                                   {{--type="text"--}}
                                                   {{--class="form-control input"--}}
                                                   {{--name="region"--}}
                                                   {{--value="{{ old('region') }}"--}}
                                                   {{--required--}}
                                                   {{--autocomplete="region">--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="col-md-6">
                                    <div class="d-flex flex-row align-items-center registerFields">
                                        <div class="col-md-3">
                                            <label for="last_name">
                                                @lang('register.last_name')
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input id="last_name"
                                                   type="text"
                                                   class="form-control input"
                                                   name="last_name"
                                                   minlength="3"
                                                   value="{{ old('last_name') }}"
                                                   required
                                                   autocomplete="last_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-row align-items-center registerFields">
                                        <div class="col-md-2">
                                            <label for="zip_code">
                                                @lang('register.zip_code')
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input id="zip_code"
                                                   type="text"
                                                   class="form-control input"
                                                   name="zip_code"
                                                   minlength="3"
                                                   value="{{ old('zip_code') }}"
                                                   required
                                                   autocomplete="zip_code">
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <label for="city">
                                                @lang('register.city_town')
                                            </label>
                                        </div>
                                        <div class="col-md-5">
                                            <input id="city"
                                                   type="text"
                                                   class="form-control input"
                                                   name="city"
                                                   minlength="3"
                                                   value="{{ old('city') }}"
                                                   required
                                                   autocomplete="city">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <div class="col-md-6">
                                    <div class="d-flex flex-row align-items-center registerFields">
                                        <div class="col-md-3 registerLabel">
                                            <label for="email">
                                                @lang('register.e-mail') address
                                            </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input id="email"
                                                   type="email"
                                                   class="form-control input"
                                                   name="email"
                                                   value="{{ old('email') }}"
                                                   required
                                                   autocomplete="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-row align-items-center registerFields">
                                        <div class="col-md-2">
                                            <label for="password">
                                                @lang('register.password')
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <input id="password"
                                                   type="text"
                                                   class="form-control input"
                                                   name="password"
                                                   required
                                                   autocomplete="password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-start">
                                <div class="col-md-6">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex flex-row registerFields">
                                            <div class="col-md-6">
                                                <label for="nickname">
                                                    @lang('register.nickname')
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="nickname"
                                                       type="text"
                                                       class="form-control input"
                                                       value="{{ old('email') }}"
                                                       name="nickname"
                                                       autocomplete="nickname">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row">
                                                <span>
                                                    You are able to use that name when you want to be annonymous and your email address  also not will be visiable at your published review.
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-row align-items-center registerFields">
                                        <div class="col-md-4">
                                            <label for="password-confirm">
                                                @lang('register.confirm_password')
                                            </label>
                                        </div>
                                        <div class="col-md-8">
                                            <input id="password-confirm"
                                                   type="text"
                                                   class="form-control input"
                                                   name="password_confirmation"
                                                   required
                                                   autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="col-md-4 offset-4" style="padding: 0 0;height: 70px">
                            {!! NoCaptcha::renderJs('en') !!}
                            {!! NoCaptcha::display(['data-size' => 'normal']) !!}
                        </div>
                    </div>
                    <div class="form-group d-flex flex-row justify-content-center align-items-center">
                        <div class="col-md-2">
                            <button type="submit" class="loginButton submitRegisterButton">
                                Save
                            </button>
                        </div>
                        <div class="col-md-2">
                            <a role="button" href="{{ route('home') }}" id="cancelButton">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
