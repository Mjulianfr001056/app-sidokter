@extends('components.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="size-full flex flex-col w-full items-center">
        <div class="size-full flex flex-col">
            <div class="w-full pl-4 pb-6">
                <span class="text-3xl text-teal-600 font-bold">Selamat Datang!</span>
            </div>
            <div class="w-full pl-4 pb-2 flex flex-row justify-end">
                <button
                    class="btn-sm py-0.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Bulan
                </button>
                <button
                    class="btn-sm py-0.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Triwulan
                </button>
                <button
                    class="btn-sm py-0.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Tahun
                </button>
            </div>
            <div class="flex flex-row">
                <x-stat-card :jumlah="13">Jumlah kegiatan periode ini</x-stat-card>
                <x-stat-card :jumlah="18">Rata-rata beban organik</x-stat-card>
                <x-stat-card :jumlah="29">Jumlah organik yang terlibat</x-stat-card>
                <x-stat-card :jumlah="40">Jumlah mitra yang terlibat</x-stat-card>
            </div>
        </div>
        <div class="grid grid-cols-2 size-full">
            <div class="p-4">
                <div style="min-height:423px" id="datawrapper-vis-9Dxft">
                    <script type="text/javascript" defer src="https://datawrapper.dwcdn.net/9Dxft/embed.js"
                            charset="utf-8" data-target="#datawrapper-vis-9Dxft"></script>
                    <noscript><img src="https://datawrapper.dwcdn.net/9Dxft/full.png" alt=""/></noscript>
                </div>
                <div class="p-4">
                    <div style="min-height:432px" id="datawrapper-vis-ZPqob">
                        <script type="text/javascript" defer src="https://datawrapper.dwcdn.net/ZPqob/embed.js"
                                charset="utf-8" data-target="#datawrapper-vis-ZPqob"></script>
                        <noscript><img src="https://datawrapper.dwcdn.net/ZPqob/full.png" alt=""/></noscript>
                    </div>
                </div>
                <div class="p-4">
                    <div style="min-height:468px" id="datawrapper-vis-ShNFa">
                        <script type="text/javascript" defer src="https://datawrapper.dwcdn.net/ShNFa/embed.js"
                                charset="utf-8" data-target="#datawrapper-vis-ShNFa"></script>
                        <noscript><img src="https://datawrapper.dwcdn.net/ShNFa/full.png"
                                       alt="A visualization of a pie chart called &quot;What do journalists drink?&quot; Compiled from a poll Kit O'Connell of the Texas Observer did on Mastodon. It's &quot;very scientific&quot; haha not really. Results: 49% coffee, 23% tea, 5% energy drinks and 23% spite. Based on 357 responses. &quot;Spite&quot; option was also the &quot;Show results&quot; choice which makes this even less useful."/>
                        </noscript>
                    </div>
                </div>
            </div>

        </div>
{{--        <div class="grid grid-cols-2 size-full">--}}
{{--            Kolom pertama--}}
{{--            <div class="flex flex-col space-y-4">--}}
{{--                Periode--}}
{{--                <div class="dropdown dropdown-bottom pl-4">--}}
{{--                    <div tabindex="0" role="button"--}}
{{--                         class="btn m-2 bg-teal-700 border-0 text-gray-50 justify-between self-center">--}}
{{--                        <div class="self-center pr-8">--}}
{{--                            <p class="text-md text-gray-50">Periode</p>--}}
{{--                        </div>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"--}}
{{--                             stroke="currentColor" class="size-6">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <ul tabindex="0" class="dropdown-content menu bg-gray-50 z-[1] w-52 p-2 shadow">--}}
{{--                        <li><a class="text-cyan-950">Item 1</a></li>--}}
{{--                        <li><a class="text-cyan-950">Item 2</a></li>--}}
{{--                        <li><a class="text-cyan-950">Item 3</a></li>--}}
{{--                        <li><a class="text-cyan-950">Item 4</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

{{--                Kartu--}}
{{--                <div class="w-full flex flex-row justify-around px-2">--}}
{{--                    Kartu pertama--}}
{{--                    <div class="card bg-teal-600 w-full mx-4 shadow-xl rounded-t-md">--}}
{{--                        <div class="card-body py-2 px-4">--}}
{{--                            <p class="card-title text-gray-50 text-center text-lg px-4">Jumlah kegiatan periode ini</p>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="flex justify-center bg-gray-50 h-24 rounded-b-md">--}}
{{--                                <p class="text-5xl text-teal-700 font-bold self-center pb-2">10</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    Kartu kedua--}}
{{--                    <div class="card bg-teal-600 w-full mx-4 shadow-xl rounded-t-md">--}}
{{--                        <div class="card-body py-2 px-4">--}}
{{--                            <p class="card-title text-gray-50 text-center text-lg px-4 ">Rata-rata beban organik</p>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="flex justify-center bg-gray-50 h-24 rounded-b-md">--}}
{{--                                <p class="text-5xl text-teal-700 font-bold self-center pb-2">5</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                Grafik--}}
{{--                <div class="size-full px-4">--}}
{{--                    <div class="card w-full shadow-xl rounded-none">--}}
{{--                        <div class="card-body py-2 px-4">--}}
{{--                            <p class="card-title text-teal-700 text-center text-xl px-4 font-bold self-center">Beban--}}
{{--                                kerja organik periode--}}
{{--                                ini</p>--}}
{{--                        </div>--}}

{{--                        Grafik beban--}}
{{--                        <div class="p-4">--}}
{{--                            <div style="min-height:423px" id="datawrapper-vis-9Dxft">--}}
{{--                                <script type="text/javascript" defer src="https://datawrapper.dwcdn.net/9Dxft/embed.js"--}}
{{--                                        charset="utf-8" data-target="#datawrapper-vis-9Dxft"></script>--}}
{{--                                <noscript><img src="https://datawrapper.dwcdn.net/9Dxft/full.png" alt=""/></noscript>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            Kolom Kedua--}}
{{--            <div class="flex flex-col mb-5 mr-2 space-y-8">--}}
{{--                <div class="size-full px-4">--}}
{{--                    <div class="card w-full shadow-xl rounded-none bg-gray-50">--}}
{{--                        <div class="card-body py-2 px-4">--}}
{{--                            <p class="card-title text-teal-700 text-center text-xl px-4 font-bold self-center">Kegiatan--}}
{{--                                setiap fungsi</p>--}}
{{--                        </div>--}}

{{--                        Grafik kegiatan--}}
{{--                        <div class="p-4">--}}
{{--                            <div style="min-height:468px" id="datawrapper-vis-ShNFa">--}}
{{--                                <script type="text/javascript" defer src="https://datawrapper.dwcdn.net/ShNFa/embed.js"--}}
{{--                                        charset="utf-8" data-target="#datawrapper-vis-ShNFa"></script>--}}
{{--                                <noscript><img src="https://datawrapper.dwcdn.net/ShNFa/full.png"--}}
{{--                                               alt="A visualization of a pie chart called &quot;What do journalists drink?&quot; Compiled from a poll Kit O'Connell of the Texas Observer did on Mastodon. It's &quot;very scientific&quot; haha not really. Results: 49% coffee, 23% tea, 5% energy drinks and 23% spite. Based on 357 responses. &quot;Spite&quot; option was also the &quot;Show results&quot; choice which makes this even less useful."/>--}}
{{--                                </noscript>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="size-full px-4">--}}
{{--                    <div class="card w-full shadow-xl rounded-none">--}}
{{--                        <div class="card-body py-2 px-4">--}}
{{--                            <p class="card-title text-teal-700 text-center text-xl px-4 font-bold self-center">Kegiatan--}}
{{--                                setiap periode</p>--}}
{{--                        </div>--}}

{{--                        Grafik kegiatan periode--}}
{{--                        <div class="p-4">--}}
{{--                            <div style="min-height:432px" id="datawrapper-vis-ZPqob">--}}
{{--                                <script type="text/javascript" defer src="https://datawrapper.dwcdn.net/ZPqob/embed.js"--}}
{{--                                        charset="utf-8" data-target="#datawrapper-vis-ZPqob"></script>--}}
{{--                                <noscript><img src="https://datawrapper.dwcdn.net/ZPqob/full.png" alt=""/></noscript>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
