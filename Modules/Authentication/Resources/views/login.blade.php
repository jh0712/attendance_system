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
                    <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                    <p class="text-muted text-center">Sign in to continue to attendance_system.</p>
                    {{ Form::open([
                                'method' => 'post',
                                'id' => 'form',
                                'url' => route('login'),
                    ]) }}
                    {!! csrf_field() !!}
                    {{ Form::formText('email', old('email'), __('a_portal.email'), [
                            'placeholder' => __('a_portal.email'),
                            'data-parsley-type' => 'email',
                            'data-parsley-type-message' => __('a_portal.email validation format'),
                            'data-parsley-required-message' => __('a_portal.email validation required'),
                    ]) }}
                    {{ Form::formPassword('password', null, __('a_portal.password'), []) }}
                    <div class="form-group row m-t-20">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" >
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20">
                            <a href="pages-recoverpw" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                        </div>
                    </div>
                {{Form::close()}}
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p>Don't have an account ? <a href="register" class="font-14 text-primary"> Signup Now </a> </p>
            <p>© {{date('Y')}}. Crafted with <i class="mdi mdi-heart text-danger"></i> by LKH</p>
        </div>

    </div>

@endsection
