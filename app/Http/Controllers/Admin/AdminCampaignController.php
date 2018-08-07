<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Campaign;

class AdminCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (request()->has('category')){
        $allCampaign = Campaign::where('category_id', request('category'))->paginate(5);
        return view('admin.admin-campaign')->withCampaigns($allCampaign);
      }
      else {
        $allCampaign = Campaign::orderByRaw("FIELD(status, 'DONE', 'ACCEPTED', 'PENDING') DESC")->paginate(10);
        return view('admin.admin-campaign')->withCampaigns($allCampaign);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $campaign = Campaign::find($id);

        return view('admin.campaign-report');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $campaign = Campaign::find($id);
          return view('admin.campaign-edit')->withCampaign($campaign);
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
        $campaign = Campaign::find($id);

        $campaign->status = $request->status;
        $campaign->goal = $request->edit;

        $campaign->save();

        return redirect()->route('admin.campaigns.index');
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
