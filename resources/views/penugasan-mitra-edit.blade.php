@php
//    dd($pilihan);
    $current_pelaksana = old('pelaksana', $detail_tugas->pelaksana);
    $current_satuan = old('satuan', $detail_tugas->satuan);
    $current_status = old('status', $detail_tugas->status);
    $detail_tugas->tanggal_penugasan = date('d-m-Y', strtotime($detail_tugas->tanggal_penugasan));
@endphp

@extends('components.layout')

@section('title', 'Edit Penugasan Mitra')

@section('content')
    <div class="size-full flex flex-col items-center px-4 py-6">
        <div class="w-full bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6 flex">
                <x-judul text="Edit Penugasan Mitra"/>
            </div>

            <form action="{{ route('penugasan-mitra-edit-save', $detail_tugas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Nama Kegiatan:</label>
                    <input type="text" id="nama" name="nama" value="{{ $detail_tugas->nama_kegiatan }}" disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Pelaksana:</label>
                    <select id="petugas" name="petugas"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        @foreach ($pilihan as $option)
                            <option value="{{ $option->id_mitra }}" {{ $current_pelaksana == $option->nama_mitra ? 'selected' : '' }}>
                                {{ $option->nama_mitra }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Pemberi Tugas:</label>
                    <input type="text" id="pemberi_tugas" name="pemberi_tugas"
                           value="{{ $detail_tugas->nama_pemberi_tugas }}" disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Tanggal Ditugaskan:</label>
                    <div class="relative w-full mt-1">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker id="tanggal_penugasan" name="tanggal_penugasan" type="text"
                               datepicker-format="dd-mm-yyyy"
                               datepicker-autohide="true"
                               class="text-gray-600 border border-gray-300 text-sm rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 block w-full ps-10 p-2.5"
                               value="{{ old('tanggal_penugasan', $detail_tugas->tanggal_penugasan) }}"
                               placeholder="Select date">
                    </div>
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
                        <input type="number" id="volume" name="volume" value="{{ $detail_tugas->volume }}"
                               class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <input type="text" id="pemberi_tugas" name="pemberi_tugas"
                               value="{{ $detail_tugas->satuan_kegiatan }}" disabled
                               class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                    </div>
                </div>

                <div class="w-full pb-2">
                    <label for="status" class="text-lg text-cyan-950 font-medium">Status:</label>
                    <select id="status" name="status"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="ditugaskan" {{ $current_status == 'ditugaskan' ? 'selected' : '' }}>Ditugaskan</option>
                        <option value="proses" {{ $current_status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $current_status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Catatan:</label>
                    <textarea id="catatan" rows="4" name="catatan"
                              class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm resize-none overflow-auto">{{ old('catatan', $detail_tugas->catatan) }}</textarea>
                </div>


                <div class="w-full flex justify-end pt-4">
                    <x-submit-button>
                        Simpan Perubahan
                    </x-submit-button>
                </div>
            </form>
        </div>
    </div>
@endsection
