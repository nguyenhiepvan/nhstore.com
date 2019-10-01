<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/dist/css/login.css') }}" rel="stylesheet">
  @yield('css')
</head>
<body>
  <div id="app">
    @yield('content')
  </div>
  <!-- particles.js container -->
  <div id="particles-js"></div>
</body>
<script type="text/javascript" src="{{ asset('assets/dist/js/particles.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/dist/js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@yield('script')
</html>
