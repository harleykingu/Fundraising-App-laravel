<div class="navbar-fixed">
  <nav>
   <div class="nav-wrapper white">
     <div class="container">
     <a href="/" class="left"><span><img src="{{ asset('img/logo.png') }}" alt="logo" width="70px" height="70px" class="responsive-img">
       
    </a>
     <a href="#" data-activates="mobile-demo" class="button-collapse right"><i class="fa fa-bars blue-text"></i></a>
     <ul class="left hide-on-med-and-down">
       <li>|||</li>
       <li><a href="/" class=" grey-text text-darken-1 active">Home</a></li>
       <li><a href="/campaigns" class=" grey-text text-darken-1  {{ Request::is('campaigns') ? "active" : "" }}">Campaigns</a></li>
       <li><a href="/about" class=" grey-text text-darken-1  {{ Request::is('about') ? "active" : "" }}">About</a></li>
       <li><a href="/contact" class=" grey-text text-darken-1  {{ Request::is('contact') ? "active" : "" }}">Contact</a></li>
     </ul>
     <ul class="right hide-on-med-and-down">
       @if (Auth::check())
       <ul id="dropdown1" class="dropdown-content blue lighten-1">
         <li><a href="{{ route('user-profile.index') }}" class="white-text"><i class="material-icons">contact_mail</i>Profile</a></li>
         <li class="divider"></li>
         <li>
           <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="white-text"><i class="material-icons">input</i>Logout</a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               {{ csrf_field() }}
           </form>
         </li>
       </ul>
       <li><a class="dropdown-button blue-text text-lighten-1" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
       @else
       <li><a href="/login" class="grey-text text-darken-1">Login</a></li>
       <li><a href="/register" class="white-text blue lighten-1 btn waves-effect">Sign Up</a></li>
       @endif
     </ul>
     <ul class="side-nav" id="mobile-demo">
       <li><a href="sass.html">Sass</a></li>
       <li><a href="badges.html">Components</a></li>
       <li><a href="collapsible.html">Javascript</a></li>
       <li><a href="mobile.html">Mobile</a></li>
     </ul>
     </div>
   </div>
 </nav>
</div>
