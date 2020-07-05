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
                <div class="user-info d-flex flex-row justify-content-end align-items-end">
                    @auth
                        {{--<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Go</button>--}}
                        <a href="{{ route('profile-info') }}" style="text-decoration: none;color: black;"><span class="text">@lang('service/index.hello', ['name' => Auth::user()->name])</span></a>
                        <img src="{{ asset('images/congrats.png') }}" height="25px" width="35px"/>
                        <img src="{{ asset('images/congrats.png') }}" height="25px" width="35px"/>
                    @endauth
                </div>
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
                                        {{--{{ __('Logout') }}--}}
                                        Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ LaravelLocalization::localizeUrl('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                            <li class="left-border">
                                <a href="#">Save</a>
                            </li>
                            <li class="left-border">
                                <a href="#">Share</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <form class="form-inline" id="searchForm">
                    <input class="form-control mr-sm-2 input" id="searchCategory" type="text" placeholder="Search" aria-label="Search">
                    <select class="form-control mr-sm-2 select" id="selectCategory">
                        <option disabled selected>@lang('service/index.head_select')</option>
                        <option value="1">@lang('service/index.person')</option>
                        <option value="2">@lang('service/index.company')</option>
                        <option value="3">@lang('service/index.goods')</option>
                        <option value="3">@lang('service/index.vacations')</option>
                    </select>
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Go</button>
                </form>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-between">
            <div class="advertising">
                <img src="{{ asset('images/advertising.jpg') }}" height="125px" width="310px"/>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="nav-gradient">
                <ul class="nav-menu navigate">
                    <li class="menu-active"><a href="{{ route('home') }}">@lang('service/index.home')</a></li>
                    <li><a href="">@lang('service/index.person')</a></li>
                    <li><a href="">@lang('service/index.company')</a></li>
                    <li><a href="" >@lang('service/index.goods')</a></li>
                    <li><a href="" >@lang('service/index.vacations')</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
