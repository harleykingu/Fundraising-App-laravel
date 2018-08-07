<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;
use App\Campaign;
use App\User;
use Mail;
use Session;
use Auth;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey("sk_test_dDntfoIF13fDBqjtLQVxJqB2");

      // Get the payment token ID submitted by the form:
      $token = $request->stripeToken;

      if(Auth::check()){

        $userid = Auth::id();

        $donation = new Donation;

        $donation->user_id = $userid;
        $donation->amount = $request->amount;
        $donation->campaign_id = $request->c_id;
        $donation->save();

        $campaign = Campaign::find($request->c_id);

        $campaign->total += $request->amount;
        $campaign->save();
      }

      //Anonymous
      else{
        $user = new User;

        $user->email = $request->A_email;
        $user->name = $request->A_name;
        $user->password = 'Anonymous';
        $user->contactNo = $request->A_contactNo;
        $user->save();

        $userid = User::orderBy('created_at', 'desc')->first();

        $donation = new Donation;

        $donation->user_id = $userid->id;
        $donation->amount = $request->amount;
        $donation->campaign_id = $request->c_id;
        $donation->save();

      }
      //===========

      if($campaign->total >= $campaign->goal){
        $campaign->status = "DONE";
        $campaign->save();
      }


      $charge = \Stripe\Charge::create(array(
      "amount" => $request->amount*100,
      "currency" => "PHP",
      "description" => "Example charge",
      "source" => $token,
      ));

      Session::flash('success', 'Your Donation has been Successfully Received! Thankyou and Godbless you.' );

      Mail::send(['text'=>'mail'],['name','AChild2Fund'],function($message){
        $message->to('strenght.o@gmail.com','To Bidlisiw')->subject('Thank you!');
        $message->from('strenght.o@gmail.com', 'Bidlisiw');
      });

      return redirect()->route('campaigns.show', $request->c_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $campaign = Campaign::find($id);

      return view('donations.checkout')->withCampaign($campaign);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
