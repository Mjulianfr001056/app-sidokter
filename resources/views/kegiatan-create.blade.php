@php use Carbon\Carbon; @endphp
@extends('components.layout')

@section('title', 'Buat Kegiatan')

@section('content')
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    <div class="size-full flex flex-col w-full items-center px-4 py-6">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6">
                <x-judul text="Buat Kegiatan"/>
            </div>

            <form action="{{ route('store-kegiatan') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="pb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                    @error('nama')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Asal Fungsi --}}
                <div class="pb-4">
                    <label for="asal_fungsi" class="block text-sm font-medium text-gray-700">Asal Fungsi</label>
                    <select id="asal_fungsi" name="asal_fungsi" required
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        <option value="Subbag Umum" {{ old('asal_fungsi') == 'Subbag Umum' ? 'selected' : '' }}>Subbag Umum</option>
                        <option value="Statistik Produksi" {{ old('asal_fungsi') == 'Statistik Produksi' ? 'selected' : '' }}>Statistik Produksi</option>
                        <option value="Statistik Distribusi" {{ old('asal_fungsi') == 'Statistik Distribusi' ? 'selected' : '' }}>Statistik Distribusi</option>
                        <option value="Statistik Sosial" {{ old('asal_fungsi') == 'Statistik Sosial' ? 'selected' : '' }}>Statistik Sosial</option>
                        <option value="IPDS" {{ old('asal_fungsi') == 'IPDS' ? 'selected' : '' }}>IPDS</option>
                        <option value="Neraca Wilayah Statistik" {{ old('asal_fungsi') == 'Neraca Wilayah Statistik' ? 'selected' : '' }}>Neraca Wilayah Statistik</option>
                    </select>
                    @error('asal_fungsi')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Periode --}}
                <div class="pb-4">
                    <label class="block text-sm font-medium text-gray-700">Periode</label>
                    <div class="mt-2 space-y-2 ml-2 flex flex-col">
                        @php
                            $options = [
                                'Bulanan' => 'Bulanan',
                                'Triwulanan' => 'Triwulanan',
                                'Semesteran' => 'Semesteran',
                                'Tahunan' => 'Tahunan',
                            ];
                        @endphp

                        @foreach ($options as $value => $label)
                            <div class="flex items-center ml-1">
                                <input type="checkbox" id="periode_{{ $value }}" name="periode[]" value="{{ $value }}"
                                       {{ in_array($value, old('periode', [])) ? 'checked' : '' }}
                                       class="h-4 w-4 text-teal-600 border-gray-300 rounded focus:ring-teal-500">
                                <label for="periode_{{ $value }}" class="ml-2 block text-sm text-gray-600">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('periode')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                {{-- Tanggal Mulai --}}
                <div class="pb-4">
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 pb-1">Tanggal Mulai</label>
                    <input datepicker id="tanggal_mulai"
                           type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full ps-10 p-2.5 "
                           placeholder="Pilih tanggal">
                    @error('tanggal_mulai')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <script>
                    document.getElementById('tanggal_mulai').addEventListener('keydown', function(event) {
                        event.preventDefault();
                    });
                </script>

                <div class="pb-4">
                    <label for="tanggal_akhir" class="block text-sm font-medium text-gray-700 pb-1">Tanggal Akhir</label>
                    <input datepicker id="tanggal_akhir"
                           type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full ps-10 p-2.5 "
                           placeholder="Pilih tanggal">
                    @error('tanggal_akhir')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <script>
                    document.getElementById('tanggal_akhir').addEventListener('keydown', function(event) {
                        event.preventDefault();
                    });
                </script>


                {{-- Target --}}
                <div class="pb-4">
                    <label for="target" class="block text-sm font-medium text-gray-700">Target</label>
                    <input type="text" id="target" name="target" value="{{ old('target') }}"
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                    @error('target')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Satuan --}}
                <div class="pb-4">
                    <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan</label>
                    <input type="text" id="satuan" name="satuan" value="{{ old('satuan') }}" required
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                    @error('satuan')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga Satuan --}}
                <div class="pb-4">
                    <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                    <input type="number" id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan') }}"
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                    @error('harga_satuan')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="flex items-center justify-center bg-teal-600 text-gray-50 hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500 rounded-md w-full max-w-28 py-2 text-sm font-semibold">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
