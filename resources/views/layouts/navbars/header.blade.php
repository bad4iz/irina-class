<nav class="navbar navbar-expand-lg bg-white mb-0">
    <div class="container">
        <a class="navbar-brand" href="/">Наш 2В класс</a>

        <ul class="navbar-nav mx-auto ">
            <li class="nav-item {{ $activePage == 'registers' ? 'active' : '' }}"><a class="text-nowrap nav-link "
                                                                                     href="/#anchor0">О нас</a></li>
            <li class="nav-item {{ $activePage == 'new' ? 'active' : '' }}"><a class="text-nowrap nav-link"
                                                                               href="{{ route('new.index') }}">Новости </a>
            </li>
            <li class="nav-item {{ $activePage == 'gallery' ? 'active' : '' }}"><a class="text-nowrap nav-link"
                                                                                   href="{{ route('gallery.index') }}">Галерея</a>
            </li>
            <li class="nav-item {{ $activePage == 's' ? 'active' : '' }}"><a class="text-nowrap nav-link"
                                                                             href="/#anchor3">Наши достижения</a></li>
            <li class="nav-item {{ $activePage == 'sf' ? 'active' : '' }}"><a class="text-nowrap nav-link"
                                                                              href="/#anchor4">Расписание</a></li>
            <li class="nav-item {{ $activePage == 'fs' ? 'active' : '' }}"><a class="text-nowrap nav-link"
                                                                              href="/#anchor5">Контакты</a></li>
        </ul>

        @guest()
            <ul class="navbar-nav">
                <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }} text-gray">
                    <a href="{{ route('register') }}" class="nav-link text-gray">
                        <i class="material-icons text-gray">person_add</i> {{ __('Регистрация') }}
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
                    <a href="{{ route('login') }}" class="nav-link text-gray">
                        <i class="material-icons ">fingerprint</i> {{ __('Войти') }}
                    </a>
                </li>
            </ul>
        @endguest
        @auth
            <ul class="navbar-nav">
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="{{ route('home') }}">--}}
                {{--                        <i class="material-icons cg">dashboard</i>--}}
                {{--                        <p class="d-lg-none d-md-block">--}}
                {{--                            {{ __('Stats') }}--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--                        <i class="material-icons cg">notifications</i>--}}
                {{--                        <span class="notification">0</span>--}}
                {{--                        <p class="d-lg-none d-md-block">--}}
                {{--                            {{ __('Some Actions') }}--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
                {{--                        <a class="dropdown-item" href="#">{{ __('Mike John responded to your email') }}</a>--}}
                {{--                        <a class="dropdown-item" href="#">{{ __('You have 5 new tasks') }}</a>--}}
                {{--                        <a class="dropdown-item" href="#">{{ __('You\'re now friend with Andrew') }}</a>--}}
                {{--                        <a class="dropdown-item" href="#">{{ __('Another Notification') }}</a>--}}
                {{--                        <a class="dropdown-item" href="#">{{ __('Another One') }}</a>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons cg">person</i>
                        {{ Auth::user()->name }}
                        <p class="d-lg-none d-md-block">
                            sadfasfd
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        {{--                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>--}}
                        {{--                                    <a class="dropdown-item" href="">{{ __('Profile') }}</a>--}}
                        {{--                                    <a class="dropdown-item" href="#">{{ __('Settings') }}</a>--}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                {{--                        {{ Auth::user()->name }}--}}
                {{--                    </a>--}}

                {{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                {{--                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
                {{--                           onclick="event.preventDefault();--}}
                {{--                                                     document.getElementById('logout-form').submit();">--}}
                {{--                            Выйти--}}
                {{--                        </a>--}}

                {{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
                {{--                            @csrf--}}
                {{--                        </form>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
            </ul>
        @endauth
    </div>
</nav>
