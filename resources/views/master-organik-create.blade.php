@php
    $options = [
            'PNS' => [
                'I/A', 'I/B', 'I/C', 'I/D',
                'II/A', 'II/B', 'II/C', 'II/D',
                'III/A', 'III/B', 'III/C', 'III/D',
                'IV/A', 'IV/B', 'IV/C', 'IV/D', 'IV/E'
            ],
            'PPPK' => [
                'I', 'II', 'III', 'IV', 'V',
                'VI', 'VII', 'VIII', 'IX', 'X',
                'XI', 'XII', 'XIII', 'XIV', 'XV',
                'XVI', 'XVII'
            ]
        ];
@endphp

@extends('components.layout')

@section('title', 'Buat Organik')

@section('content')
    <div class="size-full flex flex-col items-center px-4 py-6">
        <div class="w-full bg-white shadow-lg rounded-lg p-6">
            <div class="w-full pb-6 flex">
                <x-judul text="Buat Organik"/>
            </div>

            <form action="{{ route('master-organik-create-save') }}" method="POST">
                @csrf
                @method('POST')

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Nama Pegawai</label>
                    <input type="text" id="nama" name="nama"
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Alias</label>
                    <input type="text" id="alias" name="alias"
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">NIP</label>
                    <input type="text" id="nip" name="nip"
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">NIP BPS</label>
                    <input type="text" id="nip_bps" name="nip_bps"
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Jabatan</label>
                    <input type="text" id="jabatan" name="jabatan"
                           class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Golongan</label>
                    <select id="golongan" name="golongan"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                    </select>
                </div>

                <div class="w-full pb-2">
                    <label class="text-lg text-cyan-950 font-medium">Status</label>
                    <select id="status" name="status"
                            class="text-gray-600 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                        <option value="">-- Pilih Opsi --</option>
                        <option value="PNS">PNS</option>
                        <option value="PPPK">PPPK</option>
                    </select>
                </div>

                <script>
                    const options = @json($options);

                    function populateGolonganOptions(status) {
                        const golonganSelect = document.getElementById('golongan');

                        golonganSelect.innerHTML = '<option value="">-- Pilih Opsi --</option>';

                        if (options[status]) {
                            options[status].forEach(function(golongan) {
                                const optionElement = document.createElement('option');
                                optionElement.value = golongan;
                                optionElement.textContent = golongan;

                                golonganSelect.appendChild(optionElement);
                            });
                        }
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        if (currentStatus) {
                            document.getElementById('status').value = currentStatus;
                            populateGolonganOptions(currentStatus);
                        }
                    });

                    document.getElementById('status').addEventListener('change', function() {
                        const selectedStatus = this.value;
                        populateGolonganOptions(selectedStatus);
                    });
                </script>

                <div class="w-full flex justify-end pt-4">
                    <x-submit-button>
                        Buat Pegawai
                    </x-submit-button>
                </div>
            </form>
        </div>
    </div>
@endsection
