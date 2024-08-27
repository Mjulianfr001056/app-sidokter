@php
    $options = $pilihan->pluck('nama_pegawai');
    $selectedValue = old('pelaksana', $detail_tugas->pelaksana);
@endphp

@extends('components.layout')

@section('title', 'Edit Penugasan Organik')

@section('content')
    <div class="size-full flex flex-col items-center px-4 py-6">
        <div class="w-full bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6 flex">
                <x-judul text="Edit Kegiatan"/>
            </div>

            <form action="{{ route('penugasan-organik-edit-save', $detail_tugas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Nama Kegiatan:</label>
                    <input type="text" id="nama" name="nama" value="{{ $detail_tugas->nama_kegiatan }}" disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Pelaksana:</label>
                    <select id="asal_fungsi" name="asal_fungsi" required
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        @foreach ($options as $option)
                            <option value="{{ $option }}" {{ $selectedValue == $option ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Pemberi Tugas:</label>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Tanggal Ditugaskan:</label>
                    <input type="date" name="tanggal_penugasan" class="input w-full" value="{{ old('tanggal_penugasan', $detail_tugas->tanggal_penugasan) }}" required>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Kuantitas:</label>
                    <input type="number" name="volume" class="input w-full" value="{{ old('volume', $detail_tugas->volume) }}">
                    <select name="satuan" class="input w-full mt-2">
                        <option value="" disabled selected>Pilih Satuan</option>
                        <option value="pcs" {{ old('satuan', $detail_tugas->satuan) == 'pcs' ? 'selected' : '' }}>pcs</option>
                        <!-- Add more units as needed -->
                    </select>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Status:</label>
                    <select name="status" class="input w-full">
                        <option value="disampel" {{ old('status', $detail_tugas->status) == 'disampel' ? 'selected' : '' }}>Disampel</option>
                        <option value="proses" {{ old('status', $detail_tugas->status) == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ old('status', $detail_tugas->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Catatan:</label>
                    <textarea name="catatan" class="input w-full">{{ old('catatan', $detail_tugas->catatan) }}</textarea>
                </div>

                <div class="w-full flex justify-end pt-4">
                    <button type="submit" class="btn bg-teal-600 text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
