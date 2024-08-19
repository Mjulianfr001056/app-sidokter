@php
    use App\Helpers\SvgIcon;
@endphp

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-teal-700">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="#" class="flex items-center p-2 text-gray-50 rounded-lg hover:bg-teal-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                    </svg>
                    <span class="ms-3 font-normal">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg group hover:bg-teal-600" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left whitespace-nowrap font-normal">Capaian Kinerja</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-teal-600">Agregat</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-teal-600">Organik</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg group hover:bg-teal-600" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    {!! SvgIcon::bebanKerja() !!}
                    <span class="flex-1 ms-3 text-left whitespace-nowrap font-normal">Beban Kerja</span>
                    {!! SvgIcon::chevronDown() !!}
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-teal-600">Organik</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-teal-600">Mitra</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg group hover:bg-teal-600" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    {!! SvgIcon::masterFile() !!}
                    <span class="flex-1 ms-3 text-left whitespace-nowrap font-normal">Master File</span>
                    {!! SvgIcon::chevronDown() !!}
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-teal-600">Kegiatan</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-teal-600">Organik</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-teal-600">Mitra</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 text-gray-50 transition duration-75 rounded-lg pl-11 group hover:bg-teal-600">Perusahaan</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

