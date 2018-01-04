<?php

namespace App\Http\Controllers;
use App\Customer;
use App\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function getCustomers(){
        $customers = User::with('customer')->role('Customer')->get();
       // dd($customers);
        return view('customers', ['customers' => $customers]);
    }


    public function getCustomer($id){
        $customer = User::with('customer')->where(['id' => $id])->first();
        if (!$customer) {
            abort(404);
        }
        return view('customer', ['customer' => $customer]);
    }

    public function deleteCustomer($id){

    }

    public function updateCustomer($id){

    }


}
