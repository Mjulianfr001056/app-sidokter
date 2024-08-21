@extends('components.layout')

@section('title', 'Master Kegiatan')

@section('content')
    <div class="size-full flex flex-col w-full items-center px-4">
        {{--        Judul--}}
        <div class="w-full pb-6 ">
            <x-judul text="Daftar Kegiatan"/>
        </div>

        {{--        Pencarian--}}
        <div class="w-full flex flex-row justify-end items-center pb-0.5">
            {{-- Search Input --}}
            <div class="relative flex items-center w-64 ">
                <input type="text"
                       class="input pl-10 m-2 mr-0 w-full bg-gray-50 border border-gray-300 rounded-md input-sm focus:outline-none focus:ring-1 focus:ring-teal-600 focus:border-teal-600 peer"
                       placeholder="Cari kegiatan"/>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     class="absolute left-4 w-5 h-5 text-gray-500 transition duration-200 ease-in-out peer-focus:text-teal-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                </svg>
            </div>
        </div>


        {{--        Tabel--}}
        <div class="max-w-[78vw] flex flex-col justify-center pb-12 ">
            <div class="relative overflow-x-auto">
                <table class="table-custom">
                    <thead>
                    <tr>
                        <th scope="col" class="w-12">No</th>
                        <th scope="col" class="w-32">Tanggal</th>
                        <th scope="col" class="w-64">Nama</th>
                        <th scope="col" class="w-24">Volume</th>
                        <th scope="col" class="w-24">Satuan</th>
                        <th scope="col" class="w-52">Harga Satuan</th>
                        <th scope="col" class="w-52">Jumlah Biaya</th>
                        <th scope="col" class="w-64">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="tr-border-b">
                        <td class="px-6 py-4">1</td>
                        <td class="date-cell">2024-01-15</td>
                        <td class="px-6 py-4">John Doe</td>
                        <td class="px-6 py-4">1000</td>
                        <td class="px-6 py-4">Unit</td>
                        <td class="px-6 py-4">500000</td>
                        <td class="px-6 py-4">400000000</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-between space-x-2">
                                <button class="flex items-center justify-center bg-blue-700 text-gray-50 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg px-4 py-2 text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    View
                                </button>

                                <button class="flex items-center justify-center bg-red-700 text-gray-50 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 rounded-lg px-4 py-2 text-sm font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                    Delete
                                </button>

                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>


            <div class="flex flex-row items-center justify-between">
        <span class="text-sm text-gray-400">
            Menampilkan
            <span class="font-semibold text-gray-900">1</span>
            sampai
            <span class="font-semibold text-gray-900">7</span>
            dari
            <span class="font-semibold text-gray-900">100</span>
            entri
        </span>
                <div class="inline-flex mt-2 xs:mt-0 space-x-0.5">
                    <button
                        class="btn bg-teal-700 border-0 text-gray-50 justify-between self-center btn-sm w-24 hover:bg-teal-600 flex items-center rounded-r-none" role="button">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 5H1m0 0 4 4M1 5l4-4"/>
                        </svg>
                        Prev
                    </button>
                    <button
                        class="btn bg-teal-700 border-0 text-gray-50 justify-between self-center btn-sm w-24 hover:bg-teal-600 flex items-center rounded-l-none" role="button">
                        Next
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection
