@extends('profile.index')

@section('profile_content')
    <form class="form-horizontal change-pass-form" method="POST" novalidate="" id="changePassForm" action="{{ route('change-password') }}">
        @csrf
        <div class="form-group d-flex flex-wrap align-items-center registerFields">
            <div class="col-sm-4 col-md-2 offset-sm-1">
                <label for="new-password">Current Password</label>
            </div>
            <div class="col-sm-6">
                <input id="current-password"
                       type="password"
                       class="form-control input"
                       name="current-password"
                       value="{{ old('current-password') }}"
                       required>
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center registerFields">
            <div class="col-sm-4 col-md-2 offset-sm-1">
                <label for="new-password">New Password</label>
            </div>
            <div class="col-sm-6">
                <div id="password-rules" style="display: none;">
                    <input id="Length" type="checkbox" class="custom-checkbox"><label for="Length">Must be at least 8 charcters</label>
                    <input id="UpperCase" type="checkbox" class="custom-checkbox"><label for="Length">Must have atleast 1 upper case character</label>
                    <input id="LowerCase" type="checkbox" class="custom-checkbox"><label for="Length">Must have atleast 1 lower case character</label>
                    <input id="Numbers" type="checkbox" class="custom-checkbox"><label for="Length">Must have atleast 1 numeric character</label>
                    <input id="Symbols" type="checkbox" class="custom-checkbox"><label for="Length">Must have atleast 1 special character</label>
                </div>
                <input id="new-password"
                       type="password"
                       class="form-control input"
                       name="new-password"
                       required>
            </div>
        </div>
        <div class="form-group d-flex flex-wrap align-items-center registerFields mb-3">
            <div class="col-sm-4 col-md-2 offset-sm-1">
                <label for="new-password-confirm">Confirm Password</label>
            </div>
            <div class="col-sm-6">
                <input id="new-password-confirm"
                       type="password"
                       class="form-control input"
                       name="new-password_confirmation"
                       required>
            </div>
        </div>
        <div class="form-group d-flex justify-content-center align-items-center">
            <div class="col-md-3">
                <button type="submit" class="loginButton submitChangePassButton">
                    Save
                </button>
            </div>
            <div class="col-md-3">
                <a role="button" href="{{ route('profile-info') }}" id="cancelButton">
                    Cancel
                </a>
            </div>
        </div>
    </form>
@endsection
