@extends('app')
@section('title', '| View Campaign')
@section('content')

<div class="container"><br>
  <div class="card-panel z-depth-3">
    <h3 class="" style="margin-bottom:0;"><b>{{ ucfirst($campaign->title)  }}</b></h3>
    <span class="">Campaign By: {{ $campaign->user->name }}</span><br><br>
    <div class="divider"></div>
    <div class="row">
      <div class="col s8">
        <div class="card-panel z-depth-0 center-align">
          <img class="responsive-image" src="{{ asset('img/' . $campaign->image) }}" height="500" width="500">
        </div>
        <div class="row">
          <div class="col s12">
            <ul class="tabs">
              <li class="tab col s6"><a href="#test1" class="blue-text">Story</a></li>
            </ul>
          </div>
          <div id="test1" class="col s12">
            <p>{!! $campaign->content !!}</p>
          </div>
        </div>
      </div>
      <div class="col s4" style="margin-top:7.5px;">
        <div class="row">
          <div class="col s2">
            <h2 class="font2 grey-text text-lighten-1">Goal:</h2>
          </div>
          <div class="col s10 right-align">
            <h2 class="font1 blue-text text-lighten-1">
              &#8369; <?php $example = $campaign->goal; $subtotal =  number_format($example); echo $subtotal; ?>
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
<!-- progress-bar -->
            <div class="progress">
                <div class="determinate  blue lighten-1" style="width:{{ $percent }}%;"></div>
            </div>
            <div class="right-align"><h4 class="font1">{{ $percent }}% Funded</h4></div>
<!-- ======= -->
          </div>
        </div>
        <a href="{{ route('donate.show', $campaign->id ) }}" class="btn btn-large green" style="width:100%; height:90px;"><h4 class="font2" style="margin-bottom:0;">DONATE NOW</h4><h6>Just &#8369;50 Minimum Donation</h6></a>
      </div>
    </div>
  </div>
</div>


@endsection
