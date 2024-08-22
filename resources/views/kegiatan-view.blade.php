@php use Carbon\Carbon; @endphp
@extends('components.layout')

@section('title', 'Detail Kegiatan')

@section('content')
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="size-full flex flex-col w-full items-center px-4 py-6">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6">
                <x-judul text="Detail Kegiatan"/>
            </div>

            <form method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="pb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $kegiatan->nama) }}" disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>

                {{-- Asal Fungsi --}}
                <div class="pb-4">
                    <label for="asal_fungsi" class="block text-sm font-medium text-gray-700">Asal Fungsi</label>
                    <div class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                        @php
                            $options = [
                                'Subbag Umum' => 'Subbag Umum',
                                'Statistik Produksi' => 'Statistik Produksi',
                                'Statistik Distribusi' => 'Statistik Distribusi',
                                'Statistik Sosial' => 'Statistik Sosial',
                                'IPDS' => 'IPDS',
                                'Neraca Wilayah Statistik' => 'Neraca Wilayah Statistik',
                            ];

                            // Get the selected value
                            $selectedValue = old('asal_fungsi', $kegiatan->asal_fungsi);
                        @endphp

                        <p class="text-gray-600">
                            {{ $options[$selectedValue] ?? '-- Pilih Opsi --' }}
                        </p>
                    </div>
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

                            $selectedValues = old('periode', $kegiatan->periode);
                        @endphp

                        @foreach ($options as $value => $label)
                            <div class="flex items-center ml-1">
                                <input type="checkbox" id="periode_{{ $value }}" name="periode[]"
                                       value="{{ $value }}"
                                       {{ in_array($value, $selectedValues) ? 'checked' : '' }}
                                       disabled
                                       class="h-4 w-4 text-teal-600 border-gray-300 rounded bg-gray-100 cursor-not-allowed">
                                <label for="periode_{{ $value }}" class="ml-2 block text-sm text-gray-600">{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Tanggal Mulai --}}
                <div class="pb-4">
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700">Tanggal Mulai</label>
                    <input type="text" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_awal', $kegiatan->tanggal_mulai->format('d-m-Y')) }}" disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>

                {{-- Tanggal akhir --}}
                <div class="pb-4">
                    <label for="tanggal_akhir" class="block text-sm font-medium text-gray-700">Tanggal Akhir</label>
                    <input type="text" id="tanggal_akhir" name="tanggal_akhir" value="{{ old('tanggal_akhir', $kegiatan->tanggal_akhir->format('d-m-Y')) }}" disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>


                {{-- Target --}}
                <div class="pb-4">
                    <label for="target" class="block text-sm font-medium text-gray-700">Target</label>
                    <input type="text" id="target" name="target"
                           value="{{ old('target', $kegiatan->target) }}"
                           disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>

                {{-- Satuan --}}
                <div class="pb-4">
                    <label for="satuan" class="block text-sm font-medium text-gray-700">Satuan</label>
                    <input type="text" id="satuan" name="satuan"
                           value="{{ old('satuan', $kegiatan->satuan) }}"
                           disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>

                {{-- Harga Satuan --}}
                <div class="pb-4">
                    <label for="harga_satuan" class="block text-sm font-medium text-gray-700">Harga Satuan</label>
                    <input type="number" id="harga_satuan" name="harga_satuan"
                           value="{{ old('harga_satuan', $kegiatan->harga_satuan) }}"
                           disabled
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed">
                </div>
            </form>
        </div>
    </div>
@endsection
