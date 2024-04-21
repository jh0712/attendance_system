@extends('attendance_system.layouts.master-without-nav')

@section('content')
    <!-- Begin page -->
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">

                <h3 class="text-center m-0">
                    <h1 class="text-muted font-500 m-b-5 text-center">KH</h1>
                </h3>

                <div class="p-3">
                    <h4 class="text-muted font-18 m-b-5 text-center">Free Register</h4>
                    <p class="text-muted text-center">Get your free account now.</p>

                    <form class="form-horizontal m-t-30" action="/register" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="useremail">Email</label>
                            <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name ="name"  placeholder="Enter username">
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Password</label>
                            <input type="password" class="form-control" id="userpassword" name = "password" placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmed" name="password_confirmation" placeholder="Enter password">
                        </div>

                        <div class="form-group row m-t-20">
                            <div class="col-12 text-right">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20">
                                <p class="font-14 text-muted mb-0">By registering you agree to the Lexa <a href="#" class="text-primary">Terms of Use</a></p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p>Already have an account ? <a href="pages-login" class="font-500 font-14 text-primary font-secondary"> Login </a> </p>
            <p>© {{date('Y')}}. Crafted with <i class="mdi mdi-heart text-danger"></i> by LKH</p>
        </div>
    </div>
@endsection
