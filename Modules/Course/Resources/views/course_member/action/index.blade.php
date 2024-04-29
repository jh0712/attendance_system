@extends('attendance_system.layouts.master')

@section('css')
    @include('attendance_system.datatable.datatable-css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Course Member List</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            課程學員名單
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
                <a href="{{route('course_member.create',$course_id)}}" class="btn btn-primary waves-effect waves-light">Create</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 ">
                <div class="card m-b-20">
                    <div class="card-body">
                        <input type="hidden" name="_token" value=" '.csrf_token().' ">
                        <table id="level-table" class="table">
                            <thead>
                            <tr>
                                @foreach ($table['header'] as $header)
                                    <td>{{ $header }}</td>
                                @endforeach
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
@section('script')
    @include('attendance_system.datatable.datatable-js',[
       'id' => 'level-table',
       'ajax' => $table['url'],
       'columns' => $table['column'],
    ])
@endsection
