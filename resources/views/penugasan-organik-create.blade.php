@php

@endphp
@extends('components.layout')

@section('title', 'Buat Penugasan Organik')

@section('content')
    <div class="size-full flex flex-col items-center px-4 py-6">
        <div class="w-full bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6 flex">
                <x-judul text="Buat Penugasan Organik"/>
            </div>

            <form action="{{ route('penugasan-organik-create-save') }}" method="POST">
                @csrf
                @method('POST')

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Nama Kegiatan:</label>
                    <select id="id_kegiatan" name="id_kegiatan"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        @foreach ($daftar_kegiatan as $option)
                            <option value="{{ $option->id }}">
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
                            <option value="{{ $option->id_pegawai }}">
                                {{ $option->nama_pegawai }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Pemberi Tugas:</label>
                    <select id="pemberi_tugas" name="pemberi_tugas"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        @foreach ($pilihan_petugas as $option)
                            <option value="{{ $option->id_pegawai }}">
                                {{ $option->nama_pegawai }}
                            </option>
                        @endforeach
                    </select>
                </div>

{{--                <div class="w-full pb-2">--}}
{{--                    <label class="text-lg text-cyan-950 font-medium">Tanggal Ditugaskan:</label>--}}
{{--                    <div class="relative w-full mt-1">--}}
{{--                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">--}}
{{--                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                 fill="currentColor" viewBox="0 0 20 20">--}}
{{--                                <path--}}
{{--                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <input datepicker id="tanggal_penugasan" name="tanggal_penugasan" type="text"--}}
{{--                               datepicker-format="dd-mm-yyyy"--}}
{{--                               datepicker-autohide="true"--}}
{{--                               class="text-gray-600 border border-gray-300 text-sm rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 block w-full ps-10 p-2.5"--}}
{{--                               value=""--}}
{{--                               placeholder="Select date">--}}
{{--                    </div>--}}
{{--                </div>--}}

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
                        <select id="satuan" name="satuan"
                                class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            <option value="" selected></option>
                            <option value="oh">OH</option>
                            <option value="ok">OK</option>
                        </select>
                    </div>
                </div>

{{--                <div class="w-full pb-2">--}}
{{--                    <label for="status" class="text-lg text-cyan-950 font-medium">Status:</label>--}}
{{--                    <select id="status" name="status"--}}
{{--                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">--}}
{{--                        <option value="" >--Pilih Status--</option>--}}
{{--                        <option value="ditugaskan" >Ditugaskan</option>--}}
{{--                        <option value="proses">Proses</option>--}}
{{--                        <option value="selesai">Selesai</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

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
