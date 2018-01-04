<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Scan;
use App\Station;
use App\User;
use Illuminate\Http\Request;
use App\Product;
use Redirect;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $payment = Payment::all();
        $scans= Scan::all();
        $customers = User::with('customer')->role('Customer')->get();
        return view('home', ['products' => $products,'customers'=>$customers,'scans'=>$scans,'payments'=>$payment]);
    }

    public function logout(){
        Auth::logout();
        return view('auth.login');
    }

    public function getScans(){
        $scans = Scan::with(['product','customer'])->get();
        return view('scans',['scans'=>$scans]);
    }

    public function getReports(){

    }

    public function getStations(){
        $stations = Station::all();
        return view('stations', ['stations' => $stations]);
    }

    public function getStation($id){
        $station = Station::where(['id' => $id])->first();
        if (!$station) {
            abort(404);
        }
        return view('station', ['station' => $station]);
    }

    public function addStationPost(Request $request){
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $station = new Station();
        $station->name = $request->input('name');
        $station->save();

        return redirect()->route('stations')->with('success','The Station has been created successfully');
    }


    public function deleteStation($id)
    {
        $station = Station::where(['id' => $id])->first();
        if (!$station) {
            abort(404);
        }

        try {
            $station->delete();
        } catch (QueryException $e) {
            if ($e->getCode() == "23000") {
                return back()->withErrors('You cannot delete an item that is referenced somewhere else');
            }
        }

        return redirect()->route('station')->with('success', 'Station has been deleted Successfully');
    }

    public function updateStation(Request $request,$id){
        $station = Station::where(['id' => $id])->first();
        if (!$station) {
            abort(404);
        }
        $rules = [
            'name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $station->name = $request->input('name');
        $station->save();
        return redirect()->route('station',$id)->with('success', 'Station has been updated Successfully');
    }





    public function getUsers(){
        $users = User::where('role','!=','Admin')->get();
        return view('users', ['users' => $users]);
    }




    //mpesa test
    public function testmpesa(){
        $BusinessShortCode = "174379";
        $LipaNaMpesaPasskey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $TransactionType = "CustomerPayBillOnline";
        $Amount = "1000";
        $PartyA = "254718694198";
        $PartyB = "174379";
        $PhoneNumber="254718694198";
        $CallBackURL = "https://www.mpesa.wrostdevelopers.com/result.php";
        $AccountReference = "remarks";
        $TransactionDesc = "remarks";
        $Remarks = "remarks";


        $mpesa= new \Safaricom\Mpesa\Mpesa();

        $stkPushSimulation=$mpesa->STKPushSimulation($BusinessShortCode,
            $LipaNaMpesaPasskey, $TransactionType, $Amount, $PartyA,
            $PartyB, $PhoneNumber, $CallBackURL, $AccountReference,
            $TransactionDesc, $Remarks);
        dd($stkPushSimulation);
        return view('testmpesa');

    }


}
