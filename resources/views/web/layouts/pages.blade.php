<!doctype html>
<html lang="en">

@include('web.includes.head')

<body>

<div class="site-wrap" id="home-section">

    @include('web.includes.navBar')
    @include('web.includes.header')

    @yield('content')

    @section('rentNowSection')
        @include('web.includes.rentNow')
    @show
    @include('web.includes.footer')

</div>

@include('web.includes.footerJs')

</body>

</html>

