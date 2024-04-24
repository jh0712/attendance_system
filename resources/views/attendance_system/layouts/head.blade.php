		<meta content="Admin Dashboard" name="description" />
        <meta content="{{csrf_token()}}" name="csrf-token" />
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">

        <style>
            @yield('css')
        </style>
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
