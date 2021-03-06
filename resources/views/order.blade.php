@extends('layouts.app')

@section('title', 'Order')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Order</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                @include('includes.message-block')
                <div class="row">
                    <div class="col-lg-12">
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<form class="form" action="{{ route('customer.delete',$customer->id) }}" method="post">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<button type="submit" class="btn btn-danger btn-sm pull-right add-btn"><i class="fa fa-remove"></i> Delete</button>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Order Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form class="form"  method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Customer Name</label>
                                                <p>{{$order->customer->user->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Order Date</label>
                                                <p>{{ Carbon\Carbon::parse($order->created_at)->toDayDateTimeString() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Order Status</label>
                                                @php
                                                    if($order->status == "0"){
                                                    echo "<p style='color:red;'>Not Paid</p>";
                                                    }else{
                                                    echo "<p>Paid</p>";
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Ordered Items</label>
                                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    {{$sum = 0}}
                                                    @foreach($order->lineitems as $orderdproducts)
                                                        <tr class="odd gradeX">
                                                            <td class="center">{{ $orderdproducts->product->name }}</td>
                                                            <td class="center">{{ $orderdproducts->product->name }}</td>
                                                            <td class="center">Ksh. {{ $orderdproducts->product->price }}</td>
                                                            @php
                                                            $sum = $sum+$orderdproducts->product->price
                                                            @endphp
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Total Cost</label>
                                                <p>Ksh. {{ $sum }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </form>


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