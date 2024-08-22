@extends('components.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="size-full flex flex-col items-center">
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
                <x-line-card :judul="'Kegiatan Setiap Periode'" :labels="$kegiatan_periode_labels" :value="$kegiatan_periode_value"/>
            </div>
            <div class="row-span-1 max-h-[70vh]">
                <x-column-card :judul="'Kegiatan Setiap Organik'" :labels="$kegiatan_organik_labels" :value="$kegiatan_organik_value"/>
            </div>

            <!-- Second row -->
            <div class="row-span-1 max-h-[70vh]">
                <x-bar-card :judul="'Perusahaan Aktif Setiap Kecamatan'" :labels="$perusahaan_kecamatan_labels" :value="$perusahaan_kecamatan_value"/>
            </div>
            <div class="row-span-1 max-h-[70vh]">
                <x-doughnut-card :judul="'Kegiatan Setiap Fungsi'" :labels="$kegiatan_fungsi_labels" :value="$kegiatan_fungsi_value"/>
            </div>
        </div>
    </div>
@endsection
