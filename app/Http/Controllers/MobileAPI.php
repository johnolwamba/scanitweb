<?php

namespace App\Http\Controllers;

use App\Brand;
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
            return $this->response->array(['status'=>'error', 'error' => ['code'=>'input_invalid','message' =>$validator->errors()->all()]])->setStatusCode(422);
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

    //products
    public function getProducts(){
        $products = Product::with('brand')->get();
        return Response::json(array('status' => 'success', 'products' => $products));
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




}
