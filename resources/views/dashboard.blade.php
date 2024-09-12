@extends('components.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="size-full flex flex-col items-center">
{{--        <x-navigation.bread-crumbs :breadcrumbs="$breadcrumbs"/>--}}
        <div class="size-full flex flex-col">
            <x-judul text="Selamat datang!"/>
            <livewire:stats-card/>
        </div>

        <div class="grid grid-cols-[5fr_3fr] grid-rows-auto size-full pt-6 gap-4">
            <!-- First row -->
            <div class="row-span-1 max-h-[70vh]">
                <div class="size-full bg-gray-50 shadow-md p-4">
                    <div class="w-full pl-2 pb-6">
                        <span class="text-2xl text-teal-600 font-medium">Daftar Tugas Terkini</span>
                    </div>
{{--                    <div class="flex justify-end px-2">--}}
{{--                        //Chip here--}}
{{--                    </div>--}}
                    <div class="my-2 flex flex-col justify-center overflow-auto max-w-[50vw] px-2">
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
                                    <tr class="clickable-row hover:bg-teal-50 cursor-pointer" data-url="{{ route('penugasan-organik-detail', $item->id) }}">
                                        <td>{{  $item->nama_tugas }}</td>
                                        <td>{{ $item->nama_pemberi_tugas }}</td>
                                        @switch($item->status)
                                            @case('ditugaskan')
                                                <td class="flex justify-center items-center">
                                                    <x-badge.blue-badge :width="'28'">{{ $item->status }}</x-badge.blue-badge>
                                                </td>
                                                @break
                                            @case('proses')
                                                <td class="flex justify-center items-center">
                                                    <x-badge.yellow-badge :width="'28'">{{ $item->status }}</x-badge.yellow-badge>
                                                </td>
                                                @break
                                            @case('selesai')
                                                <td class="flex justify-center items-center">
                                                    <x-badge.green-badge :width="'28'">{{ $item->status }}</x-badge.green-badge>
                                                </td>
                                                @break
                                            @default
                                                <td class="flex justify-center items-center">
                                                    <x-badge.gray-badge :width="'28'">#not_found</x-badge.gray-badge>
                                                </td>
                                        @endswitch
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.clickable-row');
            rows.forEach(row => {
                row.addEventListener('click', function() {
                    const url = row.getAttribute('data-url');
                    if (url) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
@endsection
