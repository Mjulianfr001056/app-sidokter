@extends('components.layout')

@section('title', 'Buat Penugasan Mitra')

@section('content')
    <div class="size-full flex flex-col items-center px-4 py-6">
        <div class="w-full bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6 flex">
                <x-judul text="Buat Penugasan Mitra"/>
            </div>

            <form action="{{ route('penugasan-mitra-create-save') }}" method="POST">
                @csrf
                @method('POST')

                <x-input.dropdown :label="'Kegiatan'"
                                  :options="$daftar_kegiatan"
                                  :name="'kegiatan'"
                                  required></x-input.dropdown>

                <x-input.dropdown :label="'Pelaksana'"
                                    :options="$pilihan_petugas"
                                    :name="'petugas'"
                                    required></x-input.dropdown>

                <p class="text-lg text-cyan-950 font-medium">Informasi Pendapatan Mitra:</p>
                <div class="my-2 flex flex-col justify-center overflow-auto max-w-[78vw]">
                    <div class="relative max-h-96">
                        <table class="table-custom">
                            <thead>
                            <tr>
                                <th scope="col" class="w-8 text-center">No</th>
                                <th scope="col" class="w-52">Nama</th>
                                <th scope="col" class="w-52 text-end">Pendapatan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($daftar_pendapatan as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{ $item->nama_mitra }}</td>
                                    <td class="text-end">
                                        @php
                                            $pendapatan = $item->total_pendapatan;

                                            if($pendapatan > 0){
                                                echo "Rp" . number_format($pendapatan, 0, ',', '.');
                                            } else {
                                                echo "-";
                                            }
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <x-input.text-field
                    :label="'Jabatan Penugasan'"
                    :name="'jabatan'"
                    required></x-input.text-field>


                <x-input.double-input-layout
                    :label="'Kuantitas'"
                    :name="'kuantitas'">
                    <x-input.number-field
                        :label="'Volume'"
                        :name="'volume'"
                        :label_size="'md'"></x-input.number-field>
                    <x-input.text-field
                        :label="'Satuan'"
                        :name="'satuan'"
                        :label_size="'md'"
                        disabled></x-input.text-field>
                </x-input.double-input-layout>

                <script>
                    document.getElementById('kegiatan').addEventListener('change', function () {
                        var selectedOption = this.options[this.selectedIndex];
                        var parsedJson = JSON.parse(selectedOption.value);

                        document.getElementById('satuan').value = parsedJson.satuan;
                    });
                </script>

                <x-input.text-area
                    :label="'Catatan'"
                    :name="'catatan'"></x-input.text-area>

                <div class="w-full flex justify-end pt-4">
                    <x-submit-button>
                        Buat Penugasan
                    </x-submit-button>
                </div>
            </form>
        </div>
    </div>
@endsection
