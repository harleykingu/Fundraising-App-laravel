<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class PageController extends Controller
{
  public function index()
  {
    $campaigns = Campaign::where('status', '=', 'ACCEPTED')->get();

    return view('pages.home')->withCampaigns($campaigns);
  }

  public function getAbout()
  {
    return view('pages.about');
  }

  public function getContact()
  {
    return view('pages.contact');
  }
}
