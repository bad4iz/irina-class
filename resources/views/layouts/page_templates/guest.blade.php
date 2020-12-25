{{--@include('layouts.navbars.navs.guest', ['titlePage'=>000])--}}
<div>

    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
    @include('layouts.footers.guest')
</div>
