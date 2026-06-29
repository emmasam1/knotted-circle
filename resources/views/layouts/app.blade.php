<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'The Knotted Circle' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">

    @include('partials.navbar')

    <main class="pt-24">
        @yield('content')
    </main>

     @include('partials.footer')
</body>
</html>