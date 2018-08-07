@extends('app')
@section('title', '| User Dashboard')
@section('content')

<div class="container">

  <div class="row" style="margin-top:5%;">
    <div class="col s12">
      <div class="card blue lighten-1">
          <div class="row valign-wrapper">
            <h5 class="font1 white-text text-darken-2 col s3" style="margin-left:30px;"><b>USER ACCOUNT</b></h5>
            <h6 class="font1 col s9 right-align" style="margin-right:30px;"><a class="grey-text text-lighten-4" href="#">[ Edit ]</a></h6>
          </div>
      </div>
      <div class="card-panel">
        <div class="row">
          <div class="col s3 center-align">
            <img src="{{ asset('img/user.png') }}" width="200" height="200" class="responsive-img">
          </div>
          <div class="col s9">
            <div class="input-field">
             <input id="first_name" disabled type="text" value="{{ Auth::user()->name }}">
             <label for="first_name" class="blue-text">Name</label>
            </div>
            <div class="row">
              <div class="col s6">
                <div class="input-field">
                  <input id="first_name" disabled type="text" value="{{ Auth::user()->email }}">
                  <label for="first_name" class="blue-text">Email</label>
                </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <input id="first_name" disabled type="text" value="{{ Auth::user()->contactNo }}">
                  <label for="first_name" class="blue-text">Contact No</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="divider"></div>
        <div class="row valign-wrapper">
          <div class="col s9">
            <h1 class="font1">My Campaigns</h1>
          </div>
          <div class="col s3">
            <a href="{{ route('campaigns.create') }}" class=""><button type="button" class="btn btn-large green" style="width:100%;">CREATE CAMPAIGN <span class="large material-icons">add</span></button></a>
          </div>
        </div>
        <div class="divider"></div>
        @foreach ($data as $campaign)
          <div class="row">
            <h1>{{ $campaign-> title }}</h1>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
