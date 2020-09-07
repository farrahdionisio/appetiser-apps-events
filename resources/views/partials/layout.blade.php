<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield('title')  | Appetiser Apps </title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" crossorigin="anonymous">
    </head>
    <body>
        <!-- Header -->
        <header>
            @include('partials.header')
        </header>
        
        <!-- Main Content -->
        <div>
            @yield('content')
        </div>

        <!-- Footer -->
        <footer>
            @include('partials.footer')
        </footer>


        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>