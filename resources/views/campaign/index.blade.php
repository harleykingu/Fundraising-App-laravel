@extends('app')
@section('title', '| My Campaigns')
@section('content')

<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="create-head z-depth-2 center-align">
        <h2 class="white-text font1">Create your Campaign page for free!</h2>
        <a href="{{ route('campaigns.create') }}"class="btn btn-large yellow darken-1 grey-text text-darken-3">CREATE A CAMPAIGN</a>
      </div>
    </div>
  </div>
  <div class="divider z-depth-1 blue lighten-4"></div>
  <div class="row">
    <div class="col s6">
      <form class="" action="#" method="post" class="">
        <div class="input-field">
            <input id="last_name" type="text" class="validate">
            <label for="last_name"><span class="fa fa-search"></span> Search Campaign</label>
        </div>
      </form>
    </div>
    <div class="col s2 offset-s4">
      <form class="" action="#" method="post" class="">
        <div class="input-field">
          <select>
           <option value="" disabled selected>Sort By:</option>
           <option value="1">Sports</option>
           <option value="2">Education</option>
           <option value="3">Medical</option>
          </select>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
  @foreach ($campaigns as $campaign)
    <div class="col s3">
      <div class="card z-depth-2">
              <div class="card-image">
                <img src="{{ asset('img/' . $campaign->image) }}" width="300" height="300">
                <span class="card-title">{{ $campaign-> title}}</span>
              </div>
              <div class="card-content">
                <p>{{ substr(strip_tags($campaign-> content), 0, 100) }}{{ strlen(strip_tags($campaign->content)) > 100 ? "..." : ""}}</p>
              </div>
              <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn blue lighten-1" style="width:100%;">VIEW</a>
      </div>
    </div>
  @endforeach
  </div>
</div>

@stop
