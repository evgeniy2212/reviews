<header>
    <div class="container-fluid d-flex flex-row justify-content-between">
        <div class="d-flex flex-row justify-content-start">
            <div id="logo">
                <img src="{{ asset('images/frame.png') }}" height="125px" width="150px"/>
            </div>
        </div>
        <div class="middleHeadContainer d-flex flex-column justify-content-between">
            <div class="d-flex flex-row justify-content-between align-items-start" >
                <div class="d-flex flex-column justify-content-start" id="sitename">
                    <span>
                        <a href="{{ LaravelLocalization::localizeUrl('/') }}" class="scrollto">@lang('service/index.header_site_name')<span>.com</span></a>
                    </span>
                    <p>
                        Yours reviews makes our live better.
                    </p>
                </div>
                @auth
                    <div class="d-flex flex-row">
                        <div style="height: auto;">
                            <a href="{{ route('profile-info') }}" style="text-decoration: none;color: black;"><span class="text">@lang('service/index.hello', ['name' => Auth::user()->name])</span></a>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="user-info d-flex flex-row justify-content-between align-items-center">
                                <div class="message-count">
                                    <div class="bg"></div>
                                    <a href="{{ route('profile-messages') }}"><span>{!! (auth()->user()->getNewMessagesCount() > 0) ? auth()->user()->getNewMessagesCount() : '' !!}</span></a>
                                </div>
                                <img src="{{ asset('images/congrats.png') }}" height="20px" width="30px"/>
                            </div>
                            <div class="user-activities">
                                <span>Reviews: {{ auth()->user()->reviewsCount }}</span>
                                <span>Replies: {{ auth()->user()->commentsCount }}</span>
                                <span>Finger marks: 0</span>
                                {{--<span>Mail: 100</span>--}}
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
            <div class="d-flex flex-row justify-content-between align-items-end">
                <div class="d-flex flex-row justify-content-between">
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            @guest
                                <li>
                                    <a href="{{ LaravelLocalization::localizeUrl('/login') }}">Sign In</a>
                                </li>
                                <li class="left-border">
                                    <a href="{{ LaravelLocalization::localizeUrl('/register') }}">Sign Up</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ LaravelLocalization::localizeUrl('/logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ LaravelLocalization::localizeUrl('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                            <li class="left-border">
                                <a href="{{ asset('files/reviews4info.zip') }}" download="reviews4info">Save</a>
                            </li>
                            <li class="left-border">
                                <a href=""
                                   data-toggle="modal"
                                   data-target="#shareModal">Share</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <form method="GET"
                      action="{{ route('search') }}"
                      class="form-inline"
                      novalidate=""
                      id="searchForm">
                    <input class="form-control mr-sm-2 input"
                           id="searchCategory"
                           type="text"
                           name="search"
                           placeholder="Search"
                           aria-label="Search"
                           value="{{ isset($search) ? $search : '' }}"
                           required>
                    <select class="form-control mr-sm-2 select"
                            id="selectCategory"
                            name="category"
                            required>
                        <option disabled selected>@lang('service/index.head_select')</option>
                        @foreach(\App\Models\ReviewCategory::all('title', 'slug') as $review_category)
                            <option {{ (isset($search_category) && $search_category == $review_category->slug) ? 'selected' : '' }}
                                    value="{{ $review_category->slug }}">
                                @lang(trans('service/index.review_naming', ['name' => $review_category->lower_title]))
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Go</button>
                </form>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="post">
                <img src="{{ asset('images/post.jpg') }}" height="125px" width="310px"/>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="nav-gradient">
                <ul class="nav-menu navigate">
                    <li @if(\Route::current()->getName() == 'home')class="menu-active"@endif>
                        <a href="{{ route('home') }}">@lang('service/index.home')</a>
                    </li>
                    @foreach(\App\Models\ReviewCategory::all('title', 'slug') as $review_category)
                        <li @if(str_contains(url()->current(), $review_category->slug) || str_contains(url()->full(), 'category=' . $review_category->slug))
                            class="menu-active"@endif>
                            <a href="{{ route('reviews', $review_category->slug) }}">
                                @lang(trans('service/index.review_naming', ['name' => $review_category->lower_title]))
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
