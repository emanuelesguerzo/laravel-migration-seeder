<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Vite --}}
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <title>Laravel Trains</title>
</head>
<body>

    @yield('contenuto')
    
</body>
</html>