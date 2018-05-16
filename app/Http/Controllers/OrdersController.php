<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getOrders(){
        $orders = Order::with(['payment','customer'])->get();
        return view('orders',['orders'=>$orders]);
    }

    public function getOrder($id){
        $order = Order::with('lineitems')->where(['id'=>$id])->first();
        return view('order',['order'=>$order]);
    }


}
