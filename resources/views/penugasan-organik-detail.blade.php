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
            <div class="w-full pb-2">
                <p class="text-lg text-cyan-950 font-medium">Nama Kegiatan: </p>
                <p class="text-md text-gray-600 font-normal">{{$detail_tugas->nama_kegiatan}}</p>
            </div>
            <div class="w-full pb-2">
                <p class="text-lg text-cyan-950 font-medium">Pelaksana: </p>
                <p class="text-md text-gray-600 font-normal">{{$detail_tugas->pelaksana}}</p>
            </div>
            <div class="w-full pb-2">
                <p class="text-lg text-cyan-950 font-medium">Pemberi Tugas: </p>
                <p class="text-md text-gray-600 font-normal">{{$detail_tugas->nama_pemberi_tugas}}</p>
            </div>
            <div class="w-full pb-2">
                <p class="text-lg text-cyan-950 font-medium">Tanggal Ditugaskan: </p>
                <p class="text-md text-gray-600 font-normal">{{$detail_tugas->tanggal_penugasan}}</p>
            </div>
            <div class="w-full pb-2">
                <p class="text-lg text-cyan-950 font-medium">Kuantitas: </p>
                <p class="text-md text-gray-600 font-normal">
                    @if($detail_tugas->satuan)
                        {{ $detail_tugas->volume }} {{ strtoupper($detail_tugas->satuan)}}
                    @else
                        -
                    @endif
                </p>
            </div>
            <div class="w-full pb-2">
                <p class="text-lg text-cyan-950 font-medium">Status: </p>
                <p class="text-md text-gray-600 font-normal">{{ $detail_tugas->status }}</p>
            </div>
            <div class="w-full pb-2">
                <p class="text-lg text-cyan-950 font-medium">Catatan: </p>
                <p class="text-md text-gray-600 font-normal">{{ $detail_tugas->catatan }}</p>
            </div>
        </div>
    </div>
@endsection
