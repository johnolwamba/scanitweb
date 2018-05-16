@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Product</h3>
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
                                <form class="form" action="{{ route('product.delete',$product->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm pull-right add-btn"><i class="fa fa-remove"></i> Delete</button>
                                </form>

                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Product Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <form class="form" action="{{ route('product.update',$product->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Name</label>
                                                <input class="form-control" type="text" name="name" placeholder="Product Name" value="{{ $product->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Price</label>
                                                <input class="form-control" type="number" name="price" placeholder="Product Price" value="{{ $product->price }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Quanitity</label>
                                                <input class="form-control" type="number" name="quantity" placeholder="Product Quantity" value="{{ $product->quantity }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Weight</label>
                                                <input class="form-control" type="text" name="weight" placeholder="Product Weight" value="{{ $product->weight }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description">{{$product->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Expiry Date</label>
                                                <input class="form-control" type="date" name="expiry_date" placeholder="Product Weight" value="{{ $product->expiry_date }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Brand</label>
                                                <select name="brand_id" class="form-control">
                                                    @foreach($brands as $brand)
                                                        <option @php if($brand->id == $product->brand_id){
                                                         echo "selected='selected'";
                                                         }
                                                                @endphp
                                                                value="{{ $brand->id }}">{{ $brand->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Bar Code</label>
                                                <br>
                                                <img width="400px" height="150px" src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->bar_code, 'C39')}}" alt="barcode" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary pull-right" >Save changes</button>
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