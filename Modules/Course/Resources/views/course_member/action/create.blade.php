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
                            創建課程
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
                        <form method="POST" action="{{ route('course.store') }}">
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
                                            <select class="form-control" name="type">
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
