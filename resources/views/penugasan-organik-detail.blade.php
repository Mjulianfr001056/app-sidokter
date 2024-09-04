@extends('components.layout')

@section('title', 'Detail Penugasan Organik')

@section('content')
    <div class="size-full flex flex-col items-center px-4 py-6">
        <div class="w-full bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6 flex">
                <x-judul text="Detail Kegiatan"/>
                <div class="flex w-fit space-x-3">
                    <x-back-button :route="'beban-kerja-tugas'"/>
                    <x-edit-button :id="request()->route('id')" :route="'penugasan-organik-edit-view'"/>
                </div>
            </div>
            <x-output.details-output label="Nama Kegiatan">
                {{$detail_tugas->nama_kegiatan}}
            </x-output.details-output>
            <x-output.details-output label="Pelaksana">
                {{$detail_tugas->pelaksana}}
            </x-output.details-output>
            <x-output.details-output label="Pemberi Tugas">
                {{$detail_tugas->nama_pemberi_tugas}}
            </x-output.details-output>
            <x-output.details-output label="Jabatan Penugasan">
                {{$detail_tugas->jabatan}}
            </x-output.details-output>
            <x-output.details-output label="Tanggal Ditugaskan">
                {{$detail_tugas->tanggal_penugasan}}
            </x-output.details-output>
            <x-output.details-output label="Kuantitas">
                @if($detail_tugas->satuan)
                    {{ $detail_tugas->volume }} {{ strtoupper($detail_tugas->satuan)}}
                @else
                    -
                @endif
            </x-output.details-output>
            <x-output.details-output label="status">
                {{$detail_tugas->status}}
            </x-output.details-output>
            <x-output.details-output label="Catatan">
                {{$detail_tugas->catatan}}
            </x-output.details-output>
        </div>
    </div>
@endsection
