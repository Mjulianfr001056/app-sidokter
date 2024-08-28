@extends('components.layout')

@section('title', 'Penugasan')

@section('content')
    <div class="size-full flex flex-col w-full items-center px-4">
        {{--        Judul--}}
        <div class="w-full pb-6 ">
            <x-judul text="Dashboard Penugasan"/>
        </div>

{{--        Grid--}}
        <div class="grid grid-cols-[5fr_3fr] grid-rows-auto size-full pt-6 gap-4">
            <!-- First row -->
            <div class="row-span-1 max-h-[75vh]">
                <div class="size-full bg-gray-50 shadow-md p-4">
                    <div class="w-full pl-2 pb-6">
                        <span class="text-2xl text-teal-600 font-medium">Jumlah Tugas Anggota Tim</span>
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
                                @foreach ($tugas_tim as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_pegawai }}</td>
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
                        <p class="text-md text-gray-600 font-normal">{{$fungsi}}</p>
                    </div>
                    <div class="w-full pl-2 pb-2">
                        <p class="text-lg text-cyan-950 font-medium">Ketua Tim: </p>
                        <p class="text-md text-gray-600 font-normal">{{$ketua->nama_pegawai}}</p>
                    </div>
                    <div class="w-full pl-2 pb-2">
                        <p class="text-lg text-cyan-950 font-medium">Anggota: </p>
                        @foreach($anggota as $item)
                            <p class="text-md text-gray-600 font-normal">{{$item->nama_pegawai}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

{{--        Tugas Tim--}}
        <div class="size-full pt-6">
            <div class="size-full bg-gray-50 shadow-md p-4">
                <div class="w-full pl-2 pb-6 flex flex-row justify-between">
                    <span class="text-2xl text-teal-600 font-medium">Daftar Tugas Tim</span>
                </div>

                <div class="w-full flex flex-row justify-between items-center pb-1">
                    {{--                    Pencarian--}}
                    <div class="relative flex items-center w-64 ">
                        <input type="text"
                               class="input pl-10 m-2 ml-0 w-full bg-gray-50 border border-gray-300 rounded-md input-sm focus:outline-none focus:ring-1 focus:ring-teal-600 focus:border-teal-600 peer"
                               placeholder="Cari kegiatan"/>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="absolute left-4 w-5 h-5 text-gray-500 transition duration-200 ease-in-out peer-focus:text-teal-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                        </svg>
                    </div>
                    <x-tambah-button :route="route('create-kegiatan')"/>
                </div>

                <div class="flex flex-col justify-center overflow-x-auto max-w-[78vw]">
                    <div class="relative">
                        <table class="table-custom">
                            <thead>
                            <tr>
                                <th scope="col" class="w-8 text-center">No</th>
                                <th scope="col" class="w-44">Nama</th>
                                <th scope="col" class="w-44">Kegiatan</th>
                                <th scope="col" class="w-16 text-center">Kuantitas</th>
                                <th scope="col" class="w-8 text-center">Status</th>
                                <th scope="col" class="w-16 text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($daftarPenugasanTim as $item)
                                <tr>
                                    <td class="text-center">{{ ($daftarPenugasanTim->currentPage() - 1) * $daftarPenugasanTim->perPage() + $loop->iteration }}</td>
                                    <td>{{ $item->nama_pegawai }}</td>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td class="text-center">
                                        @if($item->satuan)
                                            {{ $item->volume }} {{ strtoupper( $item->satuan )}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->status }}</td>
                                    <td class="text-center w-16">
                                        <div class="justify-center space-x-2 px-2">
                                            <x-view-button :id="$item->id" :route="'penugasan-organik-detail'" />

                                            <form action="{{ route('penugasan-organik-delete', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <x-remove-button/>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <x-paginator :paginator="$daftarPenugasanTim"/>
        </div>

{{--        Tugas Mitra--}}
        <div class="size-full pt-6">
            <div class="size-full bg-gray-50 shadow-md p-4">
                <div class="w-full pl-2 pb-6 flex flex-row justify-between">
                    <span class="text-2xl text-teal-600 font-medium">Daftar Tugas Mitra</span>
                </div>

                <div class="w-full flex flex-row justify-between items-center pb-1">
                    {{--                    Pencarian--}}
                    <div class="relative flex items-center w-64 ">
                        <input type="text"
                               class="input pl-10 m-2 ml-0 w-full bg-gray-50 border border-gray-300 rounded-md input-sm focus:outline-none focus:ring-1 focus:ring-teal-600 focus:border-teal-600 peer"
                               placeholder="Cari kegiatan"/>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5"
                             stroke="currentColor"
                             class="absolute left-4 w-5 h-5 text-gray-500 transition duration-200 ease-in-out peer-focus:text-teal-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                        </svg>
                    </div>
                    <x-tambah-button :route="route('create-kegiatan')"/>
                </div>

                <div class="flex flex-col justify-center overflow-x-auto max-w-[78vw]">
                    <div class="relative">
                        <table class="table-custom">
                            <thead>
                            <tr>
                                <th scope="col" class="w-8 text-center">No</th>
                                <th scope="col" class="w-44">Nama</th>
                                <th scope="col" class="w-44">Kegiatan</th>
                                <th scope="col" class="w-8 text-center">Status</th>
                                <th scope="col" class="w-8 text-end">Pendapatan</th>
                                <th scope="col" class="w-16 text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($daftarPenugasanMitra as $item)
                                <tr>
                                    <td class="text-center">{{ ($daftarPenugasanMitra->currentPage() - 1) * $daftarPenugasanMitra->perPage() + $loop->iteration }}</td>
                                    <td>{{ $item->nama_mitra }}</td>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td class="text-center">{{ $item->status }}</td>
                                    <td class="text-end">
                                        @php
                                            $pendapatan = $item->volume * $item->harga_satuan;

                                            if($pendapatan > 0){
                                                echo "Rp" . number_format($pendapatan, 0, ',', '.');
                                            } else {
                                                echo "-";
                                            }
                                        @endphp
                                    </td>
                                    <td class="text-center w-16">
                                        <div class="justify-center space-x-2 px-2">
{{--                                            <x-view-button :id="$item->id" :route="'penugasan-organik-detail'" />--}}
                                            {{--                                            <x-remove-button :id="$item->id" :route="'view-kegiatan'"/>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                        <x-paginator :paginator="$daftarPenugasanMitra"/>
        </div>
    </div>
@endsection
