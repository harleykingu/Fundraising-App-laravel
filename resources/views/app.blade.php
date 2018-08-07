<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
    @yield('stylesheets')
  </head>

  <body>
<!--Navigation-->
    @include('partials._nav')

<!--Content-->
  <div class="">
      @include('partials._messages')
      @yield('content')
  </div>

<!--Footer & Scripts-->
    @include('partials._footer')
    @include('partials._javascript')
    @yield('scripts')


  </body>
</html>
