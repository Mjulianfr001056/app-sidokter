<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @livewireStyles
    <title>@yield('title')</title>
</head>
<body>
@include('components.navigation.navbar')

<x-navigation.sidebar-flow />
@yield('content')

@livewireScripts
</body>
</html>
