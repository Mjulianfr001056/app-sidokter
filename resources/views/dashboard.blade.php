@extends('components.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="size-full flex flex-col items-center">
        <div class="size-full flex flex-col">
            <x-judul text="Selamat datang!"/>

{{--            Chip periode--}}
            <div class="w-full pb-2.5 flex flex-row space-x-1 justify-end">
                <button
                    id="bulan-btn"
                    class="btn-sm w-20 text-sm font-medium text-white bg-teal-600 border border-teal-600 rounded-lg focus:outline-none transition-colors duration-300"
                    onclick="toggleActive('bulan-btn')">
                    Bulan
                </button>
                <button
                    id="triwulan-btn"
                    class="btn-sm w-20 text-sm font-medium text-cyan-950 border border-gray-300 rounded-lg focus:outline-none transition-colors duration-300"
                    onclick="toggleActive('triwulan-btn')">
                    Triwulan
                </button>
                <button
                    id="tahun-btn"
                    class="btn-sm w-20 text-sm font-medium text-cyan-950 border border-gray-300 rounded-lg focus:outline-none transition-colors duration-300"
                    onclick="toggleActive('tahun-btn')">
                    Tahun
                </button>
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

    <script>
        function toggleActive(activeId) {
            const buttons = document.querySelectorAll('.btn-sm');

            buttons.forEach(button => {
                if (button.id === activeId) {
                    button.classList.add('bg-teal-600', 'text-white');
                    button.classList.remove('text-cyan-950', 'border-gray-300');
                    button.classList.add('border-teal-600');
                } else {
                    button.classList.remove('bg-teal-600', 'text-white');
                    button.classList.add('text-cyan-950', 'border-gray-300');
                    button.classList.remove('border-teal-600');
                }
            });
        }
    </script>
@endsection
