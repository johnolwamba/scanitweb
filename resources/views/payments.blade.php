@extends('layouts.app')

@section('title', 'Payments')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Payments</h3>
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
                                All Payments
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Order Number</th>
                                        <th>Transaction Code</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($payments as $payment)
                                    <tr class="odd gradeX">
                                    <td class="center">{{ $payment->order->customer->user->name }}</td>
                                    <td class="center">SCO{{ $payment->order_id }}</td>
                                    <td class="center">{{ $payment->transaction_code }}</td>
                                     <td class="center">KSH. {{ $payment->amount }}</td>
                                    <td class="center">
                                    <a href="{{ route('payment', $payment->id) }}" class="btn btn-primary btn-sm btn-block">View</a>
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
