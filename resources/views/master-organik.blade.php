@extends('components.layout')

@section('title', 'Master Organik')

@section('content')
    <div class="size-full flex flex-col w-full items-center px-4">
        {{--        Judul--}}
        <div class="w-full pb-6 ">
            <x-judul text="Daftar Organik"/>
        </div>

        {{--        Pencarian--}}
        <div class="w-full flex flex-row justify-end items-center pb-1">
            {{-- Search Input --}}
            {{--            <div class="relative flex items-center w-64 ">--}}
            {{--                <input type="text"--}}
            {{--                       class="input pl-10 m-2 mr-0 w-full bg-gray-50 border border-gray-300 rounded-md input-sm focus:outline-none focus:ring-1 focus:ring-teal-600 focus:border-teal-600 peer"--}}
            {{--                       placeholder="Cari kegiatan"/>--}}

            {{--                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
            {{--                     stroke-width="1.5"--}}
            {{--                     stroke="currentColor"--}}
            {{--                     class="absolute left-4 w-5 h-5 text-gray-500 transition duration-200 ease-in-out peer-focus:text-teal-600">--}}
            {{--                    <path stroke-linecap="round" stroke-linejoin="round"--}}
            {{--                          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>--}}
            {{--                </svg>--}}
            {{--            </div>--}}
{{--            <x-tambah-button :route="route('create-kegiatan')"/>--}}
        </div>

        {{--        Tabel--}}
        <div class="flex flex-col justify-center overflow-x-scroll max-w-[78vw]">
            <div class="relative min-w-[78vw]">
                <table class="table-custom">
                    <thead>
                    <tr>
                        <th scope="col" class="w-4 text-center">No</th>
                        <th scope="col" class="w-20 text-center">NIP</th>
                        <th scope="col" class="w-20 text-center">NIP BPS</th>
                        <th scope="col" class="w-56">Nama</th>
                        <th scope="col" class="w-16">Alias</th>
                        <th scope="col" class="w-28">Jabatan</th>
                        <th scope="col" class="w-16">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pegawai as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-center">{{ $item->nip }}</td>
                            <td class="text-center">{{ $item->nip_bps }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alias }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td class="text-center">
                                <div class="flex justify-between space-x-2 px-2">
                                    <x-view-button :id="$item->id" :route="'view-organik'" />
                                    <x-remove-button/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <x-paginator :paginator="$pegawai"/>

    </div>
@endsection
