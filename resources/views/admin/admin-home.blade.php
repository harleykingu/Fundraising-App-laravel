@extends('admin.admin-template')
@section('body')

<div class="row">
  <div class="col s8">
    <div class="card-panel">
      <div class="row">
        <div class="col s4">
          <div class="card-panel light-green white-text">
            <div class="row">
            <i class="material-icons large col s6">person</i>
            <h3 class="font1 col s6 right-align">{{ $user_co }}</h3>
            </div>
              <h4 class="font1">Users</h4>


          </div>
        </div>
        <div class="col s4">
          <div class="card-panel blue white-text">
            <div class="row">
              <i class="material-icons large col s6">loyalty</i>
              <h3 class="font1 col s6 right-align">{{ $don_co }}</h3>
            </div>
            <h4 class="font1">Donations</h4>

          </div>
        </div>
        <div class="col s4">
          <div class="card-panel orange white-text">
            <i class="material-icons large">show_chart</i>
            <h4 class="font1">Total</h4>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="card-panel" style="height:563px;">
          <h5 class="font1 left-align blue-text text-lighten-1">Reports</h5>
          <div class="divider"></div>

        </div>
      </div>
    </div>
  </div>
  <div class="col s4">
    <div class="card-panel center-align" style="height:900px;">
      <h5 class="font1 left-align blue-text text-lighten-1">Admin Profile</h5>
      <div class="divider" style="margin-bottom:20px;"></div>
      <img src="{{ asset('img/user.png') }}" class="circle responsive-img" width="200" height="200">
      <h4 class="">Harlan Ramos</h4>
      <p>admin@gmail.com</p>
      <p class="blue-grey-text text-lighten-3" style="margin-top:0;">Admin</p>
    </div>
  </div>
</div>

@endsection
