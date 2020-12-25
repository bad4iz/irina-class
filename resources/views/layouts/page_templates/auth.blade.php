<div>
    @if (Gate::allows('superAdmin'))
        {{--        @include('layouts.navbars.sidebar')--}}
    @endif
    {{--        @include('layouts.navbars.navs.auth')--}}
    @yield('content')
    {{--        @include('layouts.footers.auth')--}}
    @include('layouts.footers.guest')
</div>
