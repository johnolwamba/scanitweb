<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Promotion;
use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Customer;
use App\Order;
use App\Product;
use App\Payment;
use App\User;
use Response;
use Carbon\Carbon;


class MobileAPI extends Controller
{

    //logout
    public function logout(){
        $user = User::find(Auth::user()->id);
        $user->api_token = '';
        $user->save();
        return Response::json(['message' => 'Logout success'], 200);
    }

    public function getAuthenticatedUser(){
        $user = Auth::user();
        return Response::json(array('status' => 'success','user' => $user));
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return Response::json(array(['status'=>'error', 'error' => ['code'=>'input_invalid','message' =>$validator->errors()->all()]]))->setStatusCode(422);
        }

        $email = $request->input('email');

        $credentials = [];
        $credentials['email'] = $email;
        $credentials['password'] = $request->input('password');

        try {
            // verify the credentials and create a token for the user
            if (Auth::attempt($credentials)) {
                $user = User::where('email', $email)->first();

                $token = bcrypt($email.$request->input('password'));

                $user->api_token = $token;
                $user->save();

                return Response::json(array('status'=>'success','token'=>$token,'user'=>$user));
            }
            else{
                return Response::json(array('status' => 'error', 'message' => 'Incorrect Email/password'));
            }

        } catch(\Exception $e){
            return Response::json(array('status' => 'error', 'message' => 'No Account found'));
        }
    }


    //register
    //register
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return Response::json(['status'=>'error', 'error' => ['code'=>'input_invalid','message' =>$validator->errors()->all()]]);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $user->customer()->create([
            'phone_number' => $request->input('phone_number')
        ]);


        return Response::json(array('status'=>'success','message'=>'Registration Successful'));
    }


    //products
    public function getProducts(){
        $products = Product::with('brand')->get();
        return Response::json(array('status' => 'success', 'products' => $products));
    }

    public function getProduct($id){
        $product = Product::with('brand')->where(['id'=>$id])->get();
        return Response::json(array('status' => 'success', 'product' => $product));
    }

    //add product
    //add product
    public function addProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'bar_code' => 'required|unique:products,bar_code',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'expiry_date' => 'required',
            'weight' => 'required',
            'brand_id' => 'required|exists:brands,id',
        ]);

        if($validator->fails()){
            return Response::json(['status'=>'error', 'error' => ['code'=>'input_invalid','message' =>$validator->errors()->all()]]);
        }

        $product = new Product();
        $product->bar_code = $request->input('bar_code');
        $product->name= $request->input('name');
        $product->price= $request->input('price');
        $product->description= $request->input('description');
        $product->quantity= $request->input('quantity');
        $product->expiry_date= $request->input('expiry_date');
        $product->weight= $request->input('weight');
        $product->brand_id = $request->input('brand_id');
        $product->save();
        return Response::json(array('status'=>'success','message'=>'Product Added Successfully'));
    }



    //check product during ordering
    public function checkProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'barcode' => 'required'
        ]);

        if($validator->fails()){
            return Response::json(array(['status'=>'error', 'error' => ['code'=>'input_invalid','message' =>$validator->errors()->all()]]))->setStatusCode(422);
        }

        $barcode = $request->input('barcode');

        $product = Product::where(['bar_code'=>$barcode])->first();
        if(!$product){
            return Response::json(array('status' => 'success', 'product_exists' => false));
        }else{
            return Response::json(array('status' => 'success', 'product_exists' => true,'product'=>$product));
        }
    }

    //scan product
    public function fetchProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'bar_code' => 'required|exists:products,bar_code',
        ]);

        if($validator->fails()){
            return Response::json(['status'=>'error', 'error' => ['code'=>'input_invalid','message' =>$validator->errors()->all()]]);
        }

        $product = Product::where(['bar_code'=>$request->input('bar_code')])->first();
        return Response::json(array('status'=>'success','product'=>$product));
    }


    //brands
    public function getBrands(){
        $brands = Brand::all();
        return Response::json(array('status' => 'success', 'brands' => $brands));
    }


    //orders
    public function removeOrder($id){
        $order = Order::where(['id'=>$id])->first();
        if(!$order){
            return Response::json(array('status'=>'error','message'=>'Order Not found'));
        }
        $order->delete();
        return Response::json(array('status'=>'success','message'=>'Order Deleted'));
    }

    public function removeProduct($id){
        $product = OrderedProduct::where(['product_id'=>$id])->first();
        if(!$product){
            return Response::json(array('status'=>'error','message'=>'Product Not found'));
        }
        $product->delete();
        return Response::json(array('status'=>'success','message'=>'Product Deleted'));
    }


    //promotions
    public function getPromotions(){
        $promotions = Promotion::with('product')->get();
        return Response::json(array('status'=>'success','promotions'=>$promotions));
    }



}
