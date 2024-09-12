@extends('components.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="size-full flex flex-col items-center">
{{--        <x-navigation.bread-crumbs :breadcrumbs="$breadcrumbs"/>--}}
        <div class="size-full flex flex-col">
            <x-judul text="Selamat datang!"/>

{{--            Chip periode--}}
            <div class="w-full flex justify-end">
                <x-chip-periode/>
            </div>

            <div class="flex flex-row space-x-4">
                <x-stat-card :jumlah="$jumlah_kegiatan">Jumlah kegiatan periode ini</x-stat-card>
                <x-stat-card :jumlah="$rerata_beban">Rata-rata beban organik</x-stat-card>
                <x-stat-card :jumlah="$organik_terlibat">Jumlah organik yang terlibat</x-stat-card>
                <x-stat-card :jumlah="$mitra_terlibat">Jumlah mitra yang terlibat</x-stat-card>
            </div>
        </div>

        <div class="grid grid-cols-[5fr_3fr] grid-rows-auto size-full pt-6 gap-4">
            <!-- First row -->
            <div class="row-span-1 max-h-[70vh]">
                <div class="size-full bg-gray-50 shadow-md p-4">
                    <div class="w-full pl-2 pb-6">
                        <span class="text-2xl text-teal-600 font-medium">Daftar Tugas Terkini</span>
                    </div>
                    <div class="my-2 flex flex-col justify-center overflow-auto max-w-[78vw]">
                        <div class="relative max-h-96">
                            <table class="table-custom">
                                <thead>
                                <tr>
                                    <th scope="col" class="w-56">Tugas</th>
                                    <th scope="col" class="w-24">Pemberi Tugas</th>
                                    <th scope="col" class="w-8 text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kegiatan_user as $item)
{{--                                        @dd($item)--}}
                                        <tr>
                                            <td>{{  $item->nama_tugas }}</td>
                                            <td>{{ $item->nama_pemberi_tugas }}</td>
                                            <td class="text-center">{{  $item->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-span-1 max-h-[70vh]">
                <x-column-card :judul="'Kegiatan Setiap Organik'" :labels="$kegiatan_organik_labels" :value="$kegiatan_organik_value"/>
            </div>

            <!-- Second row -->
            <div class="row-span-1 max-h-[70vh]">
                <x-line-card :judul="'Kegiatan Setiap Periode'" :labels="$kegiatan_periode_labels" :value="$kegiatan_periode_value"/>
            </div>
            <div class="row-span-1 max-h-[70vh]">
                <x-doughnut-card :judul="'Kegiatan Setiap Fungsi'" :labels="$kegiatan_fungsi_labels" :value="$kegiatan_fungsi_value"/>
            </div>
        </div>
    </div>
@endsection
