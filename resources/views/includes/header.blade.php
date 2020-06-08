<header id="header">
    <div class="container">
        <div id="logo" class="pull-left">
            {{--<img src="{{ asset('storage/service/logo.png') }}" height="50px" width="50px"/>--}}
            <img src="{{ asset('images/logo.png') }}" height="50px" width="50px"/>
            <span><a href="" class="scrollto">@lang('service/index.site_name')</a></span>
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
                <li class="nav-item">
                    <a class="nav-link" href="#"><span class="fas fa-user"></span> Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span class="fas fa-sign-in-alt"></span> Login</a>
                </li>
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
