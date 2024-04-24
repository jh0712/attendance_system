@extends('attendance_system.layouts.master')

@section('css')
    @include('attendance_system.form.form-advanced-css')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Member Create</h4>
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
                        <form method="POST" action="{{ route('member.update',$member->id) }}">
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $member->name }}" id="name" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="player_number" class="col-sm-2 col-form-label">Player Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{$member->player_number }}" id="player_number" name="player_number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" value="{{ $member->date_of_birth }}" id="date_of_birth" name="date_of_birth">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $member->type }}" id="type" name="type">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-sm-2 col-form-label">Note</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $member->note }}" id="note" name="note">
                                </div>
                            </div>
                            <div class="form-group row text-center"> <!-- 將按鈕置於中間 -->
                                <div class="col-sm-12">
                                    <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-primary waves-effect waves-light">Back</a>
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
    <script>
        jQuery('#date_of_birth').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    </script>
@endsection
