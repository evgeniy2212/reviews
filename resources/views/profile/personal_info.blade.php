@extends('profile.index')

@section('profile_content')
    <form method="POST" action="{{ route('register') }}" novalidate="" id="personalForm">
        @csrf
        <div class="personalFormContent">
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
                                       value="{{ $user_info->name }}"
                                       required
                                       disabled
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
                                        disabled
                                        required>
                                    <option disabled selected>{{ $user_info->region->country->country }}</option>
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
                                    <option disabled selected>{{ $user_info->region->region }}</option>
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
                                       value="{{ $user_info->last_name }}"
                                       required
                                       disabled
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
                                       value="{{ $user_info->zip_code }}"
                                       required
                                       disabled
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
                                       value="{{ $user_info->city }}"
                                       required
                                       disabled
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
                                       value="{{ $user_info->email }}"
                                       required
                                       disabled
                                       autocomplete="email">
                            </div>
                        </div>
                    </div>
                    {{--<div class="col-md-6">--}}
                        {{--<div class="d-flex flex-row align-items-center registerFields">--}}
                            {{--<div class="col-md-2">--}}
                                {{--<label for="password">--}}
                                    {{--@lang('register.password')--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-10">--}}
                                {{--<input id="password"--}}
                                       {{--type="password"--}}
                                       {{--class="form-control input"--}}
                                       {{--name="password"--}}
                                       {{--required--}}
                                       {{--disabled--}}
                                       {{--autocomplete="password">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
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
                                           name="nickname"
                                           value="{{ $user_info->nickname }}"
                                           disabled
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
                        <a role="button" href="{{ route('get-change-password') }}" id="cancelButton">
                            @lang('service/index.change_password')
                        </a>
                        {{--<div class="d-flex flex-row align-items-center registerFields">--}}
                            {{--<div class="col-md-4">--}}
                                {{--<label for="password-confirm">--}}
                                    {{--@lang('register.confirm_password')--}}
                                {{--</label>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-8">--}}
                                {{--<input id="password-confirm"--}}
                                       {{--type="password"--}}
                                       {{--class="form-control input"--}}
                                       {{--name="password_confirmation"--}}
                                       {{--required--}}
                                       {{--disabled--}}
                                       {{--autocomplete="new-password">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="d-flex flex-row">--}}
        {{--<div class="col-md-4 offset-4" style="padding: 0 0;height: 70px">--}}
        {{--{!! NoCaptcha::renderJs('en') !!}--}}
        {{--{!! NoCaptcha::display(['data-size' => 'normal']) !!}--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="form-group d-flex flex-row justify-content-center align-items-center">
            <div class="col-md-2">
                <a role="button" id="editProfileButton">
                    Edit Profile
                </a>
            </div>
            <div class="col-md-2">
                <button type="submit" class="loginButton submitRegisterButton">
                    Save
                </button>
            </div>
            <div class="col-md-2">
                <a role="button" href="{{ route('profile-info') }}" id="cancelButton">
                    Cancel
                </a>
            </div>
        </div>
    </form>
@endsection
