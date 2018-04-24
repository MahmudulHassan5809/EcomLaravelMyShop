<?php

namespace App\Http\Controllers;

//use Gloudemans\Shoppingcart\Facades\Cart;
use Cart;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use \Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    //

    public  function index(){
        if(Cart::content()->count() == 0){
            return redirect()->back();
        }
        return view('checkout');
    }

    public function pay(){
        Stripe::setApiKey("sk_test_YkwG8YiVfVJQrDzJNTco2ou0");

        $token = request()->stripeToken;

           // Charge the user's card:
        $charge = Charge::create(array(
            "amount" => Cart::total() * 100,
            "currency" => "usd",
            "description" => "MyShop",
            "source" =>  request()->stripeToken,
        ));

       Session::flash('success','Purchase Successful. Wait For Our Email');
       Cart::destroy();

       Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);

       return redirect('/');
    }
}
