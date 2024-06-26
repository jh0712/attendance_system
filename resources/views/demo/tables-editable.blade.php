@extends('demo.layouts.master')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Editable Table</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Lexa</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                                        <li class="breadcrumb-item active">Editable Table</li>
                                    </ol>

                                    <div class="state-information d-none d-sm-block">
                                        <div class="state-graph">
                                            <div id="header-chart-1"></div>
                                            <div class="info">Balance $ 2,317</div>
                                        </div>
                                        <div class="state-graph">
                                            <div id="header-chart-2"></div>
                                            <div class="info">Item Sold 1230</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-20">
                                    <div class="card-body">

                                        <h4 class="mt-0 header-title">Examples</h4>
                                        <p class="text-muted m-b-30 font-14">just start typing to edit, or move around with arrow keys or mouse clicks!</p>

                                        <table id="mainTable" class="table table-striped m-b-0">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Cost</th>
                                                <th>Profit</th>
                                                <th>Fun</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Car</td>
                                                <td>100</td>
                                                <td>200</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>Bike</td>
                                                <td>330</td>
                                                <td>240</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>Plane</td>
                                                <td>430</td>
                                                <td>540</td>
                                                <td>3</td>
                                            </tr>
                                            <tr>
                                                <td>Yacht</td>
                                                <td>100</td>
                                                <td>200</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>Segway</td>
                                                <td>330</td>
                                                <td>240</td>
                                                <td>1</td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th><strong>TOTAL</strong></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
@endsection

@section('script')
        <!-- Table editable -->
        <script src="{{ URL::asset('assets/plugins/tiny-editable/mindmup-editabletable.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/tiny-editable/numeric-input-example.js')}}"></script>
@endsection

@section('script-bottom')
        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>
@endsection
