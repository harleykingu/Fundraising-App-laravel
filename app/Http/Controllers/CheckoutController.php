<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;
use App\Campaign;
use Auth;


class CheckoutController extends Controller
{
    public function checkout(){


      return view('payments.checkout');


    }
    public function donate(Request $request){
      // Set your secret key: remember to change this to your live secret key in production
      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey("sk_test_dDntfoIF13fDBqjtLQVxJqB2");

      // Token is created using Stripe.js or Checkout!
      // Get the payment token ID submitted by the form:
      $token = $request->stripeToken;

      $user = Auth::user();
      $donation = new Donation;

      $user_id = Auth::id();

      $donation->amount = $request->amount;
      $donation->user_id = $user_id;
      $donation->campaign_id = 7;
      $total+=$request->amount;


      $donation->save();
      dd($user);
      // Charge the user's card:
      $charge = \Stripe\Charge::create(array(
      "amount" => $request->amount*100,
      "currency" => "PHP",
      "description" => "Example charge",
      "source" => $token,
      ));


      return redirect()->route('page.success');
    }

    public function success(){
      return view('payments.thankyou');
    }
}
