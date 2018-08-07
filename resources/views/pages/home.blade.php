@extends('app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col s12">
      <div class="card z-depth-5">
        <div class="carousel carousel-slider center" data-indicators="true">
          <div class="carousel-item slider1">
            <div class="center-align">
              <h1 class="font1">Your Contribution Can Help <br>Achieve a Solution</h1>
              <a class="waves-effect waves-light blue lighten-1 btn btn-large" href="{{ route('campaigns.create') }}">Start a Campaign</a>
            </div>
          </div>
          <div class="carousel-item slider2">
            <div class="center-align pad1">
              <h1 class="font1 white-text">Help Save Our Children</h1>
              <a class="waves-effect waves-light blue lighten-1 btn btn-large" href="{{ route('campaigns.create') }}">Start a Campaign</a>
            </div>
          </div>
          <div class="carousel-item slider3"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="divider z-depth-1 blue lighten-4"></div>
  <div class="row">
    <div class="col s12">
      <h3 class="center-align blue-text text-lighten-1 font1">Here's how it works</h3>
    </div>
  </div>
  <div class="row">
    <div class="col s12 m4 center-align">
      <i class="circle yellow darken-1 white-text text-lighten-3 large material-icons z-depth-5">laptop_mac</i>
      <h5>Create your Campaign</h5>
    </div>
    <div class="col s12 m4 center-align">
      <i class="circle yellow darken-1 white-text text-lighten-3 large material-icons z-depth-5">share</i>
      <h5>Share your Campaign to the world</h5><h5>and beyond</h5>
    </div>
    <div class="col s12 m4 center-align">
      <i class="circle yellow darken-1 white-text text-lighten-3 large material-icons z-depth-5">loyalty</i>
      <h5>Accept donations from</h5><h5>Bidlisiw</h5>
    </div>
  </div><br>
  <!-- <div class="divider"></div> -->
    <div class="row">
      <div class="col s12">
        <h3 class="center-align blue-text text-lighten-1 font1">Recent Campaigns</h3>
      </div>
    </div>
    <div class="row">
    @foreach ($campaigns as $campaign)
      <div class="col s6 m3 center-align">
        <div class="card  z-depth-5">
           <div class="card-image">
              <a href="{{ route('campaigns.show', $campaign-> id) }}">
                <img src="{{ asset('img/' . $campaign->image) }}" width="300" height="300">
              </a>
             <a class="grey-text">{{ ucfirst($campaign-> title) }}</a>
           </div>
           <div class="card-content">
             <p>{{ substr(strip_tags($campaign-> content), 0, 50) }}{{ strlen(strip_tags($campaign->content)) > 50 ? "..." : ""}}</p>
           </div>
           <div class="card-action">
             <a href="{{ route('campaigns.show', $campaign-> id) }}">Read More</a>
           </div>
         </div>
      </div>
    @endforeach
    </div>
    <div class="divider"></div>
</div>



@endsection
