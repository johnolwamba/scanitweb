@extends('layouts.app')

@section('title', 'Scans')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Scans</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                @include('includes.message-block')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Scans
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($scans as $scan)
                                        <tr class="odd gradeX">
                                            <td class="center">{{ $scan->customer->user->name }}</td>
                                            <td class="center">{{ $scan->product->name }}</td>
                                            <td class="center">{{ Carbon\Carbon::parse($scan->created_at)->toDayDateTimeString() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->

                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>

@endsection
@section('scripts')
@endsection
