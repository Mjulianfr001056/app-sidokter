@php
    //dd($pilihan_petugas);
@endphp
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

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Nama Kegiatan:</label>
                    <select id="kegiatan" name="kegiatan"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        @foreach ($daftar_kegiatan as $option)

                            <option value="{{
                                json_encode(['id' => $option->id,
                                    'satuan' => $option->satuan
                                ]) }}">
                                {{ $option->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Pelaksana:</label>
                    <select id="petugas" name="petugas"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        @foreach ($pilihan_petugas as $option)
                            <option value="{{ $option->id_mitra }}">
                                {{ $option->nama_mitra }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <p class="text-lg text-cyan-950 font-medium">Informasi Pendapatan Mitra:</p>
                <div class="my-2 flex flex-col justify-center overflow-x-auto max-w-[78vw]">
                    <div class="relative">
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

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Pemberi Tugas:</label>
                    <select id="pemberi_tugas" name="pemberi_tugas"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        @foreach ($pilihan_penugas as $option_penugas)
                            <option value="{{ $option_penugas->id_pegawai }}">
                                {{ $option_penugas->nama_pegawai }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <style>
                    input[type="number"]::-webkit-inner-spin-button,
                    input[type="number"]::-webkit-outer-spin-button {
                        -webkit-appearance: none;
                        appearance: none;
                    }

                    input[type="number"] {
                        -moz-appearance: textfield;
                    }
                </style>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Kuantitas:</label>
                    <div class="w-full flex space-x-3">
                        <input type="number" id="volume" name="volume" value=""
                               class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <input type="text" id="satuan" name="satuan" value="" disabled
                               class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                    </div>
                </div>

                <script>
                    document.getElementById('kegiatan').addEventListener('change', function () {
                        var selectedOption = this.options[this.selectedIndex];
                        var parsedJson = JSON.parse(selectedOption.value);

                        document.getElementById('satuan').value = parsedJson.satuan;
                    });
                </script>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Catatan:</label>
                    <textarea id="catatan" rows="4" name="catatan"
                              class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm resize-none overflow-auto"></textarea>
                </div>


                <div class="w-full flex justify-end pt-4">
                    <x-submit-button>
                        Buat Penugasan
                    </x-submit-button>
                </div>
            </form>
        </div>
    </div>
@endsection
