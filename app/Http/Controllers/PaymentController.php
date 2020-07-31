<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;
use App\Payments;
class PaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(Request $request, $package = null){
    	if($package == null || $package == ''){
    		return redirect('/user/games/view');
    	}else{
    		$package = Packages::where('name',$package)->get();
    		// echo var_dump($package[0]->name); exit();
    		return view('user_dashboard.pay')->with('package',$package);
    	}	
    }
    public function process_payment($package_id,$reference_no){
    	// `email`, `user_id`, `package_id`,
    	 // `package_name`, `package_price`, 
    	 // `created_at`, `updated_at`, `reference_no`
    	//fetch the package info 
    	// echo $package_id; echo $reference_no; exit();
    	$package = Packages::where('id',$package_id)->get();

    	$new_payment = new Payments();
    	$new_payment->email = auth()->user()->email;
    	$new_payment->user_id = auth()->user()->id;
    	$new_payment->package_id = $package[0]->id;
    	$new_payment->package_name = $package[0]->name;
    	$new_payment->package_price = $package[0]->price;
    	$new_payment->reference_no = $reference_no;
    	$saved = $new_payment->save();

    	if($saved){
    		return redirect('/user/payment-confirm/'. $package[0]->name);
    	}
    }
    public function thanks(Request $request,$package = null){
    	if($package == null){
    		return redirect('/user/games/view');
    	}else{
    		return view('user_dashboard.thanks')->with('package',$package);
    	}
    }
}
