@extends('layouts.app')

@section('title', 'Stations')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Stations</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                @include('includes.message-block')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                        <div class="col-md-12">
                            <a href="" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-sm pull-right add-btn"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                All Stations
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>



                                    @foreach($stations as $station)
                                        <tr class="odd gradeX">
                                            <td class="center"> {{ $station->name }}</td>
                                            <td class="center">
                                                <a href="{{ route('station', $station->id) }}"><button type="button" class="btn btn-primary col-xs-12">View</button></a>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Add Station</h4>
                </div>
                @include('layouts.messages')
                <form class="form" action="{{ route('station.create') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="name" placeholder="Station Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
@section('scripts')
@endsection
