@extends('components.layout')

@section('title', 'Capaian Kerja Agregat')

@section('content')
    <div class="size-full flex flex-col w-full items-center px-4">
        {{--        Judul--}}
        <div class="w-full pb-6 ">
            <x-judul text="Capaian Kegiatan Organik"/>
        </div>

        {{--        Pencarian dan Periode--}}
        <div class="w-full flex flex-row justify-between items-center pb-0.5">
            {{--            Chip Periode--}}
            <x-chip-periode/>

            {{-- Search Input --}}
            <x-search-bar/>
        </div>


        {{--        Tabel--}}
        <div class="w-full flex flex-col justify-center pb-12">

            <div class="relative overflow-x-auto">
                <table class="table-custom">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td class="date-cell">2021-10-01</td>
                        <td>Survei Biaya Hidup</td>
                        <td>John Doe</td>
                        <td>Pengawas</td>
                        <td>
                            <x-selesai-badge/>
                        </td>
                        <td>
                            <button class="flex items-center justify-center bg-blue-700 text-gray-50 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg w-20 py-0.5 text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                View
                            </button>
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
                    <span class="font-semibold text-gray-900">10</span>
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
