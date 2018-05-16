@extends('layouts.app')

@section('title', 'Orders')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Orders</h3>
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
                                All Orders
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $order)
                                    <tr class="odd gradeX">
                                    <td class="center">{{ $order->customer->user->name }}</td>
                                    <td class="center">{{ $order->customer->phone_number }}</td>
                                    <td class="center">
                                        @php
                                        if($order->status == "0"){
                                        echo "<span style='color:red;'>Not Paid</span>";
                                        }else{
                                        echo "Paid";
                                        }
                                        @endphp
                                    </td>
                                    <td class="center">
                                    <a href="{{ route('order', $order->id) }}" class="btn btn-primary btn-sm btn-block">View</a>
                                    </td>
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
