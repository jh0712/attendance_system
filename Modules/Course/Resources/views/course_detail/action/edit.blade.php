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
                        <form method="POST" action="{{ route('course_detail.update',[$courseDetail->course_id,$courseDetail->id]) }}">
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $courseDetail->name }}" id="name" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_of_birth" class="col-sm-2 col-form-label">開課日期</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="open_date" value="{{$courseDetail->open_date}}" name="open_date">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">課程類別</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="type" id="coure_id">
                                        <option>Select</option>
                                        @php
                                            $type = \Modules\Course\Enums\CourseDetail\CourseDetail::values();
                                        @endphp
                                        @foreach($type as $value)
                                            @if($value == $courseDetail->type)
                                                <option value="{{$value}}" selected>{{$value}}</option>
                                            @else
                                                <option value="{{$value}}">{{$value}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row text-center"> <!-- 將按鈕置於中間 -->
                                <div class="col-sm-12">
                                    <a href="{{route('course_detail.index',$courseDetail->course_id)}}" class="btn btn-primary waves-effect waves-light">Back</a>
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
