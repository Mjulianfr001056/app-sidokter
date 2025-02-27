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

                <x-input.dropdown
                    :label="'Nama Kegiatan'"
                    :options="$daftar_kegiatan"
                    :name="'kegiatan'"
                    required></x-input.dropdown>

                <x-input.dropdown
                    :label="'Pelaksana'"
                    :options="$pilihan_petugas"
                    :name="'petugas'"
                    required></x-input.dropdown>

                <x-input.text-field
                    :label="'Jabatan Penugasan'"
                    :name="'jabatan'"
                    required></x-input.text-field>

                <x-input.double-input-layout
                    :label="'Kuantitas'"
                    :name="'kuantitas'"
                >
                    <x-input.number-field
                        :label="'Volume'"
                        :name="'volume'"
                        :label_size="'md'"></x-input.number-field>
                    <x-input.dropdown
                        :label="'Satuan'"
                        :options="$satuan_kegiatan"
                        :name="'satuan'"
                        :label_size="'md'"></x-input.dropdown>
                </x-input.double-input-layout>

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
