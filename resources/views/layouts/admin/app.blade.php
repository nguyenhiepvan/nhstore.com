<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet">
    <link href="{{mix('/css/login.css')}}" rel="stylesheet">
    <style type="text/css">
       .copyright {
           font-size: 15px; text-align: center;
           padding: 10px;
           color: #7a8ca5;
       }
       canvas{
          position: absolute;
          top:0;
          left:0;
          z-index:-1;
      }
      #gif{
        display: none;
    }
</style>
@yield('css')
</head>
<body>
    <div id="app">
     <img src="{{ asset('loading.gif') }}" id="gif" style="margin-left: auto;
     margin-right: auto;
     display: block; width: ">
     <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r68/three.min.js"></script>
<script type="text/javascript" src="{{mix('js/particle.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
@yield('scripts')
</html>