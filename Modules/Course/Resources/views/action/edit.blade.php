@extends('attendance_system.layouts.master')

@section('css')
    @include('attendance_system.form.form-advanced-css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Course Create</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            創建學員
                        </li>
                    </ol>
                    <div class="state-information d-none d-sm-block">
                        <div class="state-graph">
                            <div id="header-chart-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 ">

            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 ">
                <div class="card m-b-20">
                    <div class="card-body">
                        <form method="POST" action="{{ route('course.update',$course->id) }}">
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $course->name }}" id="name" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price_of_each" class="col-sm-2 col-form-label">Player Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" value="{{$course->price_of_each }}" id="price_of_each" name="price_of_each">
                                </div>
                            </div>
                            <div class="form-group row text-center"> <!-- 將按鈕置於中間 -->
                                <div class="col-sm-12">
                                    <a href="{{route('course.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
                                    <button type="submit"  class="mt-0 btn btn-primary waves-effect waves-light">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('attendance_system.form.form-advanced-js')
@endsection
