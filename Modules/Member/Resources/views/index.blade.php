@extends('attendance_system.layouts.master')

@section('css')
    .pagination-links {
    margin-top: 20px; /* 添加顶部间距 */
    text-align: center; /* 居中对齐分页链接 */
    }

    .pagination-links .pagination {
    display: inline-block;
    }

    .pagination-links .pagination li {
    display: inline;
    margin-right: 5px; /* 调整分页链接之间的间距 */
    }

    .pagination-links .pagination li a {
    color: #333; /* 链接颜色 */
    padding: 5px 10px; /* 添加内边距 */
    border: 1px solid #ccc; /* 添加边框 */
    text-decoration: none; /* 去除下划线 */
    }

    .pagination-links .pagination li.active a {
    background-color: #007bff; /* 激活状态的背景颜色 */
    color: #fff; /* 激活状态的文字颜色 */
    border-color: #007bff; /* 激活状态的边框颜色 */
    }

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Member List</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            學員清單
                        </li>
                    </ol>
                    <div class="state-information d-none d-sm-block">
                        {{--                        <div class="state-graph">--}}
                        {{--                            <div id="header-chart-1"></div>--}}
                        {{--                            <div class="info">total stocks count</div>--}}
                        {{--                        </div>--}}
                        <div class="state-graph">
                            <div id="header-chart-2"></div>
                            <div class="info">全部學員數量 {{$members->total()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 ">
                <div class="card m-b-20">
                    <div class="card-body">
                        <table id="level-table" class="table">
                            <thead>
                            <tr>
                                <th>姓名</th>
                                <th>電話</th>
                                <th>球員編號</th>
                                <th>生日</th>
                                <th>類別</th>
                                <th>備註</th>
                            </tr>
                            </thead>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>{{ $member->player_number }}</td>
                                    <td>{{ $member->birth_of_date }}</td>
                                    <td>{{ $member->type }}</td>
                                    <td>{{ $member->note }}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{$members->links()}}

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

@endsection
@section('script')
@endsection
