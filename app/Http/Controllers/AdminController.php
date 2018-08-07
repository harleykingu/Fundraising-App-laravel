<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Donation;
use App\Bankinfo;
use App\User;
use View;
use Session;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCampaign = Campaign::all();
        $allUser = User::all();
        $user_count = User::count();
        $donation_count = Donation::count();


        return view('admin.admin-home')->withCampaigns($allCampaign)->withUsers($allUser)->with('user_co',$user_count)->with('don_co',$donation_count);
    }




    // public function accept(Request $request, $id)
    // {
    //   $campaign = Campaign::find($id);
    //
    //   $campaign->status = $request->get('accept');
    //   $campaign->save();
    //
    //   Session::flash('success', 'The changes was successfully saved.' );
    //   return redirect()->route('admin.dashboard');
    // }
    //
    // public function bankinfo(Request $request)
    // {
    //   $bankinfo = new Bankinfo;
    //
    //   $bankinfo->acc_num = $request->acc_num;
    //   $bankinfo->acc_name = $request->acc_name;
    //   $bankinfo->acc_amount = $request->acc_amount;
    //   $bankinfo->acc_code = $request->acc_code;
    //   $bankinfo->save();
    //
    //   Session::flash('success', 'Info Added' );
    //   return redirect()->route('admin.dashboard');
    // }


  /*  public function deny(Request $request, $id)
    {

      $campaign = Campaign::find($id);

      $campaign->status = $request->get('deny');
      $campaign->save();

      Session::flash('success', 'The changes was successfully saved.' );
      return redirect()->route('admin.dashboard');
    } */
}
