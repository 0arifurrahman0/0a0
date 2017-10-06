<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<!-- Head -->
<head>
    @include('layouts.head')
    <style>
        html, body {
            height:100%;
        }
        body{
            align-items: center;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;            
        }
    </style>
</head>

<body>
    <div id="app">

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
