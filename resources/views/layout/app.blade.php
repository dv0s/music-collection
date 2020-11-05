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
<body>
    <main class="container mx-auto">
        <h1 class="text-3xl text-center">Music collection</h1>
        @yield('main')
    </main>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @stack('script')
</body>
</html>