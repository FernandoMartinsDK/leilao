<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <!-- Css Adicional -->
    @yield('css')
</head>
<body>
    <div>
        @yield('content')
    </div>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @yield('js')
</body>
</html>
