@extends('attendance_system.layouts.master')

@section('css')
    @include('attendance_system.form.form-advanced-css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">member mapping</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            加入課程名單
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
                        <form method="POST" action="{{ route('course_member.store',$course_id) }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <table id="level-table" class="table">
                                <thead>
                                <tr>
                                    <td>checkbox</td>
                                    <td>id</td>
                                    <td>name</td>
                                    <td>date_of_birth</td>
                                    <td>mapping type</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td><input type="checkbox" name="members[]" value="{{$member->id}}"></td>
                                        <td>{{$member->id}}</td>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->date_of_birth}}</td>
{{--                                        mapping_type are dropdown from coursemember.php--}}
                                        <td>
                                            <select class="form-control" name="type[{{$member->id}}]">
                                                <option>Select</option>
                                                @php
                                                    $type = \Modules\Course\Enums\CourseMember\CourseMember::values();
                                                @endphp
                                                @foreach($type as $value)
                                                    @if($value == \Modules\Course\Enums\CourseMember\CourseMember::Ori->value)
                                                        <option value="{{$value}}" selected>{{$value}}</option>
                                                    @else
                                                        <option value="{{$value}}">{{$value}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="form-group row text-center"> <!-- 將按鈕置於中間 -->
                                <div class="col-sm-12">
                                    <a href="{{route('course_member.index',$course_id)}}" class="btn btn-primary waves-effect waves-light">Back</a>
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
