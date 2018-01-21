<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use Illuminate\Http\Request;
use Redirect;
use Validator;
use Carbon\Carbon;

class ProductsController extends Controller
{
   public function getProducts(){
        $products = Product::all();
       return view('products', ['products' => $products]);
   }

   public function getProduct($id){
       $product = Product::with('brand')->where(['id' => $id])->first();
       if (!$product) {
           abort(404);
       }
       $brands = Brand::all();
       return view('product', ['product' => $product,'brands'=>$brands]);
   }


   public function addProductPost(Request $request){

   }

   public function deleteProduct($id){

   }

   public function updateProduct(Request $request, $id){
       $product = Product::where(['id' => $id])->first();
       if (!$product) {
           abort(404);
       }
       $rules = [
           'name' => 'required',
           'price' => 'required',
           'quantity' => 'required',
           'weight' => 'required',
           'description' => 'required',
           'expiry_date' => 'required',
           'brand_id'=>'required'
       ];
       $validator = Validator::make($request->all(), $rules);

       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }

       $date = Carbon::createFromFormat('Y-m-d', $request->input('expiry_date'));

       $product->name = $request->input('name');
       $product->price = $request->input('price');
       $product->quantity = $request->input('quantity');
       $product->weight = $request->input('weight');
       $product->description = $request->input('description');
       $product->expiry_date = $date;
       $product->brand_id = $request->input('brand_id');
       $product->save();
       return redirect()->route('product',$product)->with('success', 'Product has been updated Successfully');
   }



}
