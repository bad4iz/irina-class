<style>
    .cg {
        color: grey;
    }
</style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " style="position: fixed">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="material-icons cg">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            {{ __('Stats') }}
                        </p>
                    </a>
                </li>
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
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <i class="material-icons cg">person</i>--}}
{{--                        <p class="d-lg-none d-md-block">--}}
{{--                            {{ __('Account') }}--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">--}}
{{--                        --}}{{--            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>--}}
{{--                        --}}{{--            <a class="dropdown-item" href="#">{{ __('Settings') }}</a>--}}
{{--                        --}}{{--            <div class="dropdown-divider"></div>--}}
{{--                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>
