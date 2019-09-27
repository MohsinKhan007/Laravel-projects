<!doctype html>
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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    

    @include('pages.navbar')
    @include('pages.inc.messages')

    
    <div class="container">

    {{-- @yield('content') --}}
</div>

<footer>
    <div class="container-fluid">
    <p>Created By <mark>M.Mohsin</mark></p> 
    <h6>mohsinwaseem65@gmail.com</h6>
    </div>
</footer>


</body>
</html>
