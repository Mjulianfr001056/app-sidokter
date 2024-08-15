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

<div class="drawer lg:drawer-open">
    <input id="open-sidebar" type="checkbox" class="drawer-toggle"/>
    <div class="drawer-content flex flex-col items-center justify-center">
        @yield('content')
    </div>
    <div class="drawer-side">
        <ul class="menu text-gray-50 min-h-full w-80 p-4 bg-teal-600">
            <livewire:sidebar-links />
        </ul>
    </div>
</div>

@livewireScripts
</body>
</html>
