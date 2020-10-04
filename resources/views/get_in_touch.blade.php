@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('send-touch-info') }}" enctype="multipart/form-data" novalidate="" id="sendTouchInfo">
        @csrf
        <div class="container-fluid">
            <div class="container">
                <div class="get-in-touch-content-place">
                    <div>
                        <div class="get-in-touch-info-place">
                            <div class="col-md-5 offset-md-1 touch-info-sitename">
                                <span>@lang('service/index.site_name')</span>
                            </div>
                        </div>
                        <div class="get-in-touch-info-place">
                            <div class="col-md-5 offset-md-1">
                                <div class="get-in-touch-info-item">
                                    <span>77 Sundial Ave.</span>
                                    <span>Suite 77</span>
                                    <span>Manchester, NH 30101</span>
                                </div>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <div class="get-in-touch-info-item">
                                    <div style="white-space:nowrap">
                                        <span style="font-weight: bold">Tel.</span> <span>603 888-8888</span>
                                    </div>
                                    <div style="white-space:nowrap">
                                        <span style="font-weight: bold">Fax.</span> <span>603 888-8888</span>
                                    </div>
                                    <div style="white-space:nowrap">
                                        <span style="font-weight: bold">Email:</span> <span>info@Reviews4info.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="touch-info-message-header">
                        <span>Get In Touch</span>
                    </div>
                    <div class="d-flex flex-row justify-content-around">
                        <div class="touch-input-container">
                            <div style="white-space:nowrap">
                                <span class="create-review-label text-center">
                                    @lang('service/index.your_name')
                                </span>
                            </div>
                            <div>
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
                        <div class="touch-input-container">
                            <div style="white-space:nowrap">
                            <span class="create-review-label text-center">
                                @lang('service/index.your_email')
                            </span>
                            </div>
                            <div>
                                <input id="email"
                                       type="email"
                                       class="form-control input"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email">
                            </div>
                        </div>
                        <div class="touch-input-container">
                            <div style="white-space:nowrap">
                            <span class="create-review-label text-center">
                                @lang('service/index.your_phone')
                            </span>
                            </div>
                            <div>
                                <input id="phone"
                                       type="text"
                                       class="form-control input"
                                       name="phone"
                                       required
                                       value="{{ old('phone') }}">
                            </div>
                        </div>
                    </div>
                    <div class="touch-info-message">
                        <div class="col-md-8">
                            <textarea name="message"
                                      class="form-control"
                                      type="text"
                                      required
                                      placeholder="@lang('service/index.touch_text_placeholder')"></textarea>
                        </div>
                    </div>
                    <div class="create-review-buttons">
                        <div class="col-md-2">
                            <button type="submit" class="createReviewButton loginButton submitTouchInfoButton">
                                Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection