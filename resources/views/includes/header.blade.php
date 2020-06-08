<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            {{--<img src="{{ asset('storage/service/logo.png') }}" height="50px" width="50px"/>--}}
            <img src="{{ asset('images/logo.png') }}" height="50px" width="50px"/>
            <span><a href="{{ LaravelLocalization::localizeUrl('/') }}" class="scrollto">@lang('service/index.site_name')</a></span>
            {{--<a class="navbar-brand" href="{{ LaravelLocalization::localizeUrl('/') }}">--}}
                {{--{{ config('app.name', 'Laravel') }}--}}
            {{--</a>--}}
            <p>
                Yours reviews makes our live better.
            </p>
        </div>
        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="">@lang('service/index.home')</a></li>
                <li><a href="">@lang('service/index.person')</a></li>
                <li><a href="">@lang('service/index.company')</a></li>
                <li><a href="">@lang('service/index.goods')</a></li>
                <li><a href="">@lang('service/index.vacations')</a></li>
                @guest
                    <li>
                        <a href="{{ LaravelLocalization::localizeUrl('/login') }}"><span class="fas fa-sign-in-alt"></span> Login</a>
                    </li>
                    <li>
                        <a href="{{ LaravelLocalization::localizeUrl('/register') }}"><span class="fas fa-user"></span> Sign Up</a>
                    </li>
                @else
                    {{--<li>--}}
                        {{--<a href="{{ LaravelLocalization::localizeUrl('/logout') }}"--}}
                           {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                            {{--{{ __('Logout') }}--}}
                        {{--</a>--}}
                        {{--<form id="logout-form" action="{{ LaravelLocalization::localizeUrl('/logout') }}" method="POST" style="display: none;">--}}
                            {{--@csrf--}}
                        {{--</form>--}}
                    {{--</li>--}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @lang('service/index.hello', ['name' => Auth::user()->name])<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="">
                                    Account
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ LaravelLocalization::localizeUrl('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ LaravelLocalization::localizeUrl('/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--@lang('service/index.hello', ['name' => Auth::user()->name])<span class="caret"></span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li>
                        <a href="#">
                            <span class="fas fa-envelope fa-2x"></span>
                        </a>
                    </li>
                    <li>
                        <img src="{{ asset('images/congrats.png') }}" height="21px" width="35px"/>
                    </li>
                @endguest
            </ul>
            <nav class="navbar navbar-light bg-white pull-right" id="nav-search-container">
                <a href="#"><i class="nav-link fas fa-share-alt fa-lg"> Share</i></a>
                <a href="#"><i class="nav-link fas fa-file-download fa-lg"> Save</i></a>
                <form class="form-inline">
                    <select class="form-control mr-sm-2" id="exampleFormControlSelect1">
                        <option selected>@lang('service/index.head_select')</option>
                        <option value="1">@lang('service/index.person')</option>
                        <option value="2">@lang('service/index.company')</option>
                        <option value="3">@lang('service/index.goods')</option>
                        <option value="3">@lang('service/index.vacations')</option>
                    </select>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button>
                </form>
            </nav>
        </nav>


    </div>
</header>
