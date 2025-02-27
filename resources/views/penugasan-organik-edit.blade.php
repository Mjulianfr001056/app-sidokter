@php
    $current_pelaksana = old('pelaksana', $detail_tugas->pelaksana);
    $current_satuan = old('satuan', $detail_tugas->satuan);
    $current_status = ucfirst(old('status', $detail_tugas->status));
    $detail_tugas->tanggal_penugasan = date('d-m-Y', strtotime($detail_tugas->tanggal_penugasan));

@endphp

@extends('components.layout')

@section('title', 'Edit Penugasan Organik')

@section('content')
    <div class="size-full flex flex-col items-center px-4 py-6">
        <div class="w-full bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6 flex">
                <x-judul text="Edit Penugasan Organik"/>
            </div>

            <form action="{{ route('penugasan-organik-edit-save', $detail_tugas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <x-input.text-field :label="'Nama Kegiatan'"
                                    :name="'nama'"
                                    :value="$detail_tugas->nama_kegiatan"
                                    required
                                    disabled/>

                <x-input.dropdown :label="'Pelaksana'"
                                  :options="$pilihan"
                                  :name="'petugas'"
                                  :selected="$current_pelaksana"
                                  required></x-input.dropdown>

                <x-input.dropdown :label="'Pemberi Tugas'"
                                  :options="$pilihan"
                                  :name="'pemberi_tugas'"
                                  :selected="$detail_tugas->nama_pemberi_tugas"
                                  required></x-input.dropdown>

                <x-input.text-field :label="'Jabatan Tugas'"
                                    :name="'jabatan'"
                                    :value="$detail_tugas->jabatan"
                                    required
                                    />

                <x-input.datepicker :label="'Tanggal Ditugaskan'"
                                     :name="'tanggal_penugasan'"
                                     :value="$detail_tugas->tanggal_penugasan"
                                     required></x-input.datepicker>

                <x-input.double-input-layout
                    :label="'Kuantitas'"
                    :name="'kuantitas'"
                >
                    <x-input.number-field :label="'Volume'"
                                          :name="'volume'"
                                            :label_size="'md'"
                                          :value="$detail_tugas->volume"></x-input.number-field>
                    <x-input.dropdown :label="'Satuan'"
                                      :options="$satuan_kegiatan"
                                      :name="'satuan'"
                                        :label_size="'md'"
                                      :selected="$current_satuan"></x-input.dropdown>
                </x-input.double-input-layout>

                <x-input.dropdown :label="'Status'"
                                  :options="$status_kegiatan"
                                  :name="'status'"
                                  :selected="$current_status"
                                  required></x-input.dropdown>

                <x-input.text-area :label="'Catatan'"
                                   :name="'catatan'"
                                   :value="$detail_tugas->catatan"></x-input.text-area>

                <div class="w-full flex justify-end pt-4">
                    <x-submit-button>
                        Simpan Perubahan
                    </x-submit-button>
                </div>
            </form>
        </div>
    </div>
@endsection
