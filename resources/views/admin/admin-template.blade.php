<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
    <link rel="stylesheet" href="{{ asset('css/styles-admin.css') }}">
  </head>
  <body>
    <ul class="side-nav fixed z-depth-5">
        <div class="row white"><br>
          <div class="col s12 center-align">
            <a href="{{ route('admin.home') }}" class="simple-text">
                <img src="{{ asset('img/logo.png') }}" alt="" width="100" height="90">
                <h3 class="font1 contact">B i d l i s i w</h3>
            </a>
          </div>
        </div>
        <li>
            <a href="{{ route('admin.home') }}">
                <i class="material-icons">dashboard</i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}">
                <i class="material-icons">person</i> Users
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.campaigns.index') }}">
                <i class="material-icons">mode_edit</i> Campaigns
            </a>
        </li>
        <li class="">
            <a href="{{ route('admin.donations.index') }}">
                <i class="material-icons">loyalty</i> Donations
            </a>
        </li>
        <li>
            <a href="{{ route('admin.transactions.index')}}">
                <i <i class="material-icons">show_chart</i> Transactions
            </a>
        </li>
        <li class="divider grey darken-2"></li>
        <li>
          <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              <i <i class="material-icons">input</i> Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
    </ul>
    <div class="main" style="margin-left:320px;">
      @yield('body')
    </div>
    @include('partials._javascript')
  </body>

</html>
