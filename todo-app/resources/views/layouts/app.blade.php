<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ToDo App')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-900 text-white">
    <div class="container mx-auto mt-5">
        @auth
        <form action="{{ route('logout') }}" method="POST" class="mb-4">
            @csrf
            <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded">Logout</button>
        </form>
        @endauth
        @yield('content')
    </div>
    @vite('resources/js/app.js')
</body>

</html>