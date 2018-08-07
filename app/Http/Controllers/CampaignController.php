<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\User;
use App\Donation;
use Auth;
use Session;
use Image;
use DB;
use Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $campaigns = Campaign::where('status', '=', 'ACCEPTED')->get();

        // if(Auth::check())
        return view('campaign.index')->withCampaigns($campaigns);
        //
        // else
        // return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
          return view('campaign.create');

        else
          return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validate the data
      $this->validate($request, array(
        'title' => 'required|max:255',
        'content' => 'required',
        'campaign_img' => 'required',
        'goal' => 'required|integer'
      ));

      //Store in the datavase
      $campaign = new Campaign;
      $user_id = Auth::id();
      $user = Auth::user();

      $campaign->title = $request->title;
      $campaign->user_id = $user_id;
      $campaign->goal = $request->goal;
      $campaign->child = $request->child;
      $campaign->due_date = $request->due_date;
      $campaign->category_id = $request->category;
      $campaign->content = $request->content;
      $campaign->total = 0;

      //Save our Image
      if ($request->hasFile('campaign_img')) {
        $image = $request->file('campaign_img');
        $filename = time(). '.' . $image->getClientOriginalExtension();
        $location = public_path('img/' . $filename);
        Image::make($image)->fit(400, 400, function ($constraint){
          $constraint->aspectRatio();
          $constraint->upsize();
        })->save($location);

        $campaign->image = $filename;
      }

      $campaign->save();

      $user->address = $request->address;
      $user->contactNo = $request->contactNo;
      $user->save();

      Session::flash('success', 'Thank You! please wait for validation' );

      return redirect()->route('user-profile.index');
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

        $current = $campaign->total;
        $goal = $campaign->goal;
        $percent = ($current/$goal)*100;



        return view('campaign.show')->withCampaign($campaign)->withPercent($percent);
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
      return view('campaign.edit')->withCampaign($campaign);
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
      $this->validate($request, array(
        'title' => 'required|max:255',
        'content' => 'required',
        'campaign_img' => 'required'
      ));

      $campaign = Campaign::find($id);

      $campaign->title = $request->input('title');
      $campaign->category_id = $request->input('category');
      $campaign->content = $request->input('content');

      if ($request->hasFile('campaign_img')){
        $image = $request->file('campaign_img');
        $filename = time(). '.' . $image->getClientOriginalExtension();
        $location = public_path('img/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);
        $oldFilename = $campaign->image;

        $campaign->image = $filename;

        Storage::delete($oldFilename);
      }

      $campaign->save();

      Session::flash('success', 'The Campaign has been updated' );

      return redirect()->route('campaigns.show', $campaign->id);
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
