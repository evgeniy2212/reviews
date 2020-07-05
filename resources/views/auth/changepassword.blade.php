@extends('profile.index')

@section('profile_content')
    <form class="form-horizontal" method="POST" action="{{ route('change-password') }}">
        @csrf

        <div class="form-group d-flex flex-row align-items-center registerFields">
            <div class="col-md-2 offset-1">
                <label for="new-password">Current Password</label>
            </div>
            <div class="col-md-6">
                <input id="current-password"
                       type="password"
                       class="form-control input"
                       name="current-password"
                       value="{{ old('current-password') }}"
                       required>
            </div>
        </div>
        <div class="form-group d-flex flex-row align-items-center registerFields">
            <div class="col-md-2 offset-1">
                <label for="new-password">New Password</label>
            </div>
            <div class="col-md-6">
                <input id="new-password"
                       type="password"
                       class="form-control input"
                       name="new-password"
                       required>
            </div>
        </div>
        <div class="form-group d-flex flex-row align-items-center registerFields">
            <div class="col-md-2 offset-1">
                <label for="new-password-confirm">Confirm Password</label>
            </div>
            <div class="col-md-6">
                <input id="new-password-confirm"
                       type="password"
                       class="form-control input"
                       name="new-password_confirmation"
                       required>
            </div>
        </div>
        <div class="form-group d-flex flex-row justify-content-center align-items-center">
            <div class="col-md-3">
                <button type="submit" class="loginButton submitRegisterButton">
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
