<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
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
            <x-navigation.link
                route="{{ route('dashboard') }}"
                :active="request()->routeIs('dashboard')"
                text="Dashboard"
            />
            <x-navigation.link
                route="{{ route('kegiatan') }}"
                :active="request()->routeIs('kegiatan')"
                text="Kegiatan"
            />
            <x-navigation.link
                route="{{ route('beban-kerja') }}"
                :active="request()->routeIs('beban-kerja')"
                text="beban-kerja"
            />
        </ul>
    </div>
</div>

</body>
</html>
