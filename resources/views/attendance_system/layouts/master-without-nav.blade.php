<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>attendance_system</title>
        @include('attendance_system.layouts.head')
  </head>
<body>
    <!-- Begin page -->
        <div id="wrapper" class="nav_bgc bgc_admin form_tracking">
            @yield('content')
        </div>
    @include('attendance_system.layouts.footer-script')
    </body>
</html>
