@extends('components.layout')

@section('title', 'Penugasan')

@section('content')
    <div class="size-full flex flex-col w-full items-center px-4">
        {{--        Judul--}}
        <div class="w-full pb-6 ">
            <x-judul text="Dashboard Penugasan"/>
        </div>

        <div class="grid grid-cols-[5fr_3fr] grid-rows-auto size-full pt-6 gap-4">
            <!-- First row -->
            <div class="row-span-1 max-h-[75vh]">
                <div class="size-full bg-gray-50 shadow-md p-4">
                    <div class="w-full pl-2 pb-6">
                        <span class="text-2xl text-teal-600 font-medium">Daftar Tugas Tim</span>
                    </div>

                    <div class="flex flex-col justify-center overflow-x-auto max-w-[70vw]">
                        <div class="relative">
                            <table class="table-custom">
                                <thead>
                                <tr>
                                    <th scope="col" class="w-8 text-center">No</th>
                                    <th scope="col" class="w-56">Nama</th>
                                    <th scope="col" class="w-8 text-center">Tugas</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($penugasan_tim as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->rank }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td class="text-center">{{ $item->jumlah_kegiatan }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-span-1 flex flex-col justify-between max-w-[75vw]">
                <div class="size-full bg-gray-50 shadow-md p-4">
                    <div class="w-full pl-2 pb-6">
                        <span class="text-2xl text-teal-600 font-medium">Informasi Tim</span>
                    </div>
                    <div class="w-full pl-2 pb-2">
                        <p class="text-lg text-cyan-950 font-medium">Fungsi: </p>
                    </div>
                    <div class="w-full pl-2 pb-2">
                        <p class="text-lg text-cyan-950 font-medium">Ketua Tim: </p>
                        <p class="text-md text-gray-600 font-medium">Nama Ketua</p>
                    </div>
                    <div class="w-full pl-2 pb-2">
                        <p class="text-lg text-cyan-950 font-medium">Anggota: </p>
                        <p class="text-md text-gray-600 font-medium">Nama Anggota</p>
                        <p class="text-md text-gray-600 font-medium">Nama Anggota</p>
                        <p class="text-md text-gray-600 font-medium">Nama Anggota</p>
                        <p class="text-md text-gray-600 font-medium">Nama Anggota</p>
                        <p class="text-md text-gray-600 font-medium">Nama Anggota</p>
                        <p class="text-md text-gray-600 font-medium">Nama Anggota</p>
                        <p class="text-md text-gray-600 font-medium">Nama Anggota</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
