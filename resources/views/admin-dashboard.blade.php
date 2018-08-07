<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
    @yield('stylesheets')
  </head>

  <body>


<!--Content-->

    @include('partials._messages')
    @yield('content')


<!--Footer & Scripts-->
    @include('partials._footer')
    @include('partials._javascript')
    @yield('scripts')

  </body>
</html>
