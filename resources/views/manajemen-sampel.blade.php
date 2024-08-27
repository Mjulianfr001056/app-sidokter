@php use Carbon\Carbon; @endphp
@extends('components.layout')

@section('title', 'Manajemen Sampel')

@section('content')
    <div class="size-full flex flex-col w-full items-center px-4">
        <div class="w-full pb-6 ">
            <x-judul text="Manajemen Sampel"/>
        </div>
        <div class="grid grid-cols-[5fr_3fr] grid-rows-auto size-full pt-6 gap-4">
            <!-- First row -->
            <div class="row-span-1 max-h-[70vh]">
{{--                <x-bar-card :judul="'Jumlah Kegiatan per Perusahaan'" :labels="" :value=""/>--}}
{{--                <x-line-card :judul="'Kegiatan Setiap Periode'" :labels="$kegiatan_periode_labels" :value="$kegiatan_periode_value"/>--}}
            </div>
            <div class="row-span-1 max-h-[70vh]">
                <h1>Manajemen Sampel</h1>
{{--                <x-column-card :judul="'Kegiatan Setiap Organik'" :labels="$kegiatan_organik_labels" :value="$kegiatan_organik_value"/>--}}
            </div>
        </div>
    </div>
@endsection
