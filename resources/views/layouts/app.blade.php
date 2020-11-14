<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') ?? "Music Collection App" }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('style')
</head>
<body class="bg-gray-100 text-gray-800">
    <header class="bg-blue-300 h-32">
        <h1 class="text-4xl text-center text-white py-6"><a href="{{ url('/') }}">{{ config('app.name') ?? "Music Collection App" }}</a></h1>
        @include('layouts.partials.head-nav')
    </header>

    <main class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="sm:w-full lg:w-2/3 min-h-500 py-6">
                <div class="flex w-full p-4 bg-white min-h-full">
                    @yield('main')
                </div>
            </div>

            <div class="hidden md:block lg:w-1/3">
                @include('layouts.partials.right-menu')
            </div>
            
        </div>    
    </main>

    <footer>
        @yield('footer')
    </footer>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @stack('script')
</body>
</html>