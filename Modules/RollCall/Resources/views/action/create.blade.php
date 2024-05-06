@extends('attendance_system.layouts.master')

@section('css')
    @include('attendance_system.form.form-advanced-css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">roll call</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            點名
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
                        <div class="row">
                            <div class="col-4">
                                <h4>課程：{{$course->name}}</h4>
                            </div>
                            <div class="col-4">
                                <h4>課程內容：{{$courseDetail->name}}</h4>
                            </div>
                            <div class="col-4">
                                <h4>總人數：{{$members->count()}}</h4>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('roll_call.store') }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <table id="level-table" class="table">
                                <thead>
                                <tr>
                                    <td>check</td>
                                    <td>id</td>
                                    <td>name</td>
                                    <td>date_of_birth</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td><input type="checkbox" name="members[]" value="{{$member->id}}"></td>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->date_of_birth}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="form-group row text-center"> <!-- 將按鈕置於中間 -->
                                <div class="col-sm-12">
                                    <a href="{{route('course_detail.index',$course_id)}}" class="btn btn-primary waves-effect waves-light">Back</a>
                                    <button type="submit"  class="mt-0 btn btn-primary waves-effect waves-light">Add</button>
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
