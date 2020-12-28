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
                    {{--<script>--}}
                        {{--setTimeout(function() {--}}
                            {{--var ad = document.querySelector("ins.adsbygoogle"); // создаем переменную с блоком рекламы от гугл--}}
                            {{--var adblock = document.getElementsByClassName('ads'); // создаем переменную с нашим блоком ads--}}
                            {{--if (ad && ad.innerHTML.replace(/\s/g, "").length == 0) { // Если рекламный блок пуст--}}
                                {{--ad.style.cssText = 'display:block !important'; // Делаем его видимым в любом случае--}}
                                {{--for(var i = 0; i < adblock.length; i++) { // Если у нас много блоков с рекламой, проходимся по всем.--}}
                                    {{--(function(index) {--}}
                                        {{--adblock[index].innerHTML = 'Здесь была бы реклама, если бы не adblock и я получил бы лишнию копейку, а так тут просто черный блок с текстом';--}}
                                        {{--adblock[index].style.background = '#000';--}}
                                        {{--adblock[index].style.color = '#fff';--}}
                                        {{--adblock[index].style.padding = '15px';--}}
                                        {{--adblock[index].style.fontSize = '20px';--}}
                                        {{--adblock[index].style.minHeight = '90px';--}}
                                        {{--adblock[index].style.maxWidth = '728px';--}}
                                        {{--adblock[index].style.margin = '15px auto';--}}
                                        {{--adblock[index].className = '';--}}
                                    {{--})(i);--}}
                                {{--}--}}
                            {{--}--}}
                        {{--}, 2000);--}}
                    {{--</script>--}}
                </div>
                @auth
                    @if(auth()->user()->email_verified_at && !auth()->user()->two_factor_code)
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
                                    <img id="congratulation-img" src="{{ App\Services\CongratsService::getUserCongratulation(auth()->user()) }}" height="35px" width="30px"/>
                                    @include('includes.popups.congratulation_rules')
                                </div>
                                <div class="user-activities">
                                    <span>Reviews: {{ auth()->user()->reviewsCount }}</span>
                                    <span>Replies: {{ auth()->user()->commentsCount }}</span>
                                    <span>Finger marks: {{ auth()->user()->reaction_count ?? 0 }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="d-flex flex-row justify-content-between align-items-end">
                <div class="d-flex flex-row justify-content-between">
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            @if(auth()->user()
                            && auth()->user()->email_verified_at
                            && !auth()->user()->two_factor_code)
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
                            @else
                                <li>
                                    <a href="{{ LaravelLocalization::localizeUrl('/login') }}">Sign In</a>
                                </li>
                                <li class="left-border">
                                    <a href="{{ LaravelLocalization::localizeUrl('/register') }}">Sign Up</a>
                                </li>
                            @endif
                            <li class="left-border">
{{--                                <a href="{{ asset('files/reviews4info.zip') }}" download="reviews4info">Save</a>--}}
                                <a href="{{ route('save-shortcut') }}">Save</a>
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
                <div class="slider">
                    <div class="slider__wrapper">
                        {{--<div class="slider__item">--}}
                            {{--<div style="height: 120px; background: url(../images/post.jpg) 100% 100% no-repeat; background-size: cover;">1</div>--}}
                            {{--<div style="height: 120px; background-image: url(../images/post.jpg); background-repeat: no-repeat; background-size: cover;">1</div>--}}
                        {{--</div>--}}
                        @foreach(\App\Services\BannerService::getHeadBanners() as $banner)
                            <div class="slider__item">
                                <div class="slider_content" style="height: 150px; background-position: center top; background-image: url('{{ $banner->getImageUrl() }}'); background-size: auto {{ empty($banner->title) ? '150' : '125' }}px;">
                                    <span>{{ empty($banner->title) ? '' : $banner->title }}</span>
                                </div>
                            </div>
                        @endforeach
                        {{--<div class="slider__item">--}}
                            {{--<div style="height: 120px; background: url(../images/post.jpg) 100% 100% no-repeat; background-size: cover;">2</div>--}}
                        {{--</div>--}}
                    </div>
                    <a class="slider__control slider__control_left" href="#" role="button"></a>
                    <a class="slider__control slider__control_right" href="#" role="button"></a>
                </div>
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
