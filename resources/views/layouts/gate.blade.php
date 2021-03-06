<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Collection</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('style')
</head>
<body class="bg-gray-100 text-gray-800">

    <main class="container mx-auto">    
        @yield('main')
    </main>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @stack('script')
</body>
</html>