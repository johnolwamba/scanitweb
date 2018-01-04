<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function getPayments(){
        $payments = Payment::with('order')->get();
        return view('payments',['payments'=>$payments]);
    }

    public function getPayment($id){
        $payment = Payment::with('order')->where(['id'=>$id])->first();
        return view('payment',['payment'=>$payment]);
    }

}
