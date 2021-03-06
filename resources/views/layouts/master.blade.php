<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Furbook</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  </head>
  <body>
    <div class="container">
      <div class="page-header">

        <div class="text-right">
          @if(Auth::check())
            Logged in as
            <strong>{{ Auth::user()->name }}</strong>
            {!! link_to('auth/logout', 'Log Out') !!}
          @else
            {!! link_to('auth/login', 'Log In') !!}
          @endif
        </div>

        @yield('header')
      </div>
      @if(Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
      @endif
      @yield('content')
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>
