<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('admin.includes.sideBar')

        <!-- top navigation -->
        @include('admin.includes.topNav')
        <!-- /top navigation -->

        @yield('content')

        <!-- footer content -->
        @include('admin.includes.footer')
        <!-- /footer content -->
    </div>
</div>

@include('admin.includes.footerJs')

</body>
</html>
