@extends('components.layout')

@section('title', 'Master Mitra')

@section('content')
    <div class="size-full flex flex-col w-full items-center px-4">
        {{--        Judul--}}
        <div class="w-full pb-6 ">
            <x-judul text="Daftar Perusahaan"/>
        </div>

        {{--        Pencarian--}}
        <div class="w-full flex flex-row justify-end items-center pb-0.5">
            {{-- Search Input --}}
            <div class="relative flex items-center w-64 ">
                <input type="text"
                       class="input pl-10 m-2 mr-0 w-full bg-gray-50 border border-gray-300 rounded-md input-sm focus:outline-none focus:ring-1 focus:ring-teal-600 focus:border-teal-600 peer"
                       placeholder="Cari kegiatan"/>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     class="absolute left-4 w-5 h-5 text-gray-500 transition duration-200 ease-in-out peer-focus:text-teal-600">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                </svg>
            </div>
        </div>


        {{--        Tabel--}}
        <div class="max-w-[78vw] flex flex-col justify-center pb-12 ">
            <div class="relative overflow-x-auto">
                <table class="table-custom">
                    <thead>
                    <tr>
                        <th scope="col" class="w-12">No</th>
                        <th scope="col" class="w-64">Nama</th>
                        <th scope="col" class="w-48">Kode KBLI</th>
                        <th scope="col" class="w-64">Alamat</th>
                        <th scope="col" class="w-36">Email</th>
                        <th scope="col" class="w-52">Kontak</th>
                        <th scope="col" class="w-36">Status</th>
                        <th scope="col" class="w-64">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="tr-border-b">
                        <td class="px-6 py-4">1</td>
                        <td class="px-6 py-4">John Doe</td>
                        <td class="px-6 py-4">123456</td>
                        <td class="px-6 py-4">Jalan Jalan</td>
                        <td class="px-6 py-4">someemail@email.com</td>
                        <td class="px-6 py-4">08123121312</td>
                        <td class="px-6 py-4">
                            <x-aktif-badge/>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-between space-x-2">
                                <x-view-button/>
                                <x-remove-button/>
                            </div>
                        </td>
                    </tr>
                    <tr class="tr-border-b">
                        <td class="px-6 py-4">2</td>
                        <td class="px-6 py-4">Jane Doe</td>
                        <td class="px-6 py-4">123456</td>
                        <td class="px-6 py-4">Jalan Jalan</td>
                        <td class="px-6 py-4">someemail@email.com</td>
                        <td class="px-6 py-4">08123121312</td>
                        <td class="px-6 py-4">
                            <x-nonaktif-badge/>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-between space-x-2">
                                <x-view-button/>
                                <x-remove-button/>
                            </div>
                        </td>
                    </tr>
                    <tr class="tr-border-b">
                        <td class="px-6 py-4">3</td>
                        <td class="px-6 py-4">John Doe</td>
                        <td class="px-6 py-4">123456</td>
                        <td class="px-6 py-4">Jalan Jalan</td>
                        <td class="px-6 py-4">someemail@email.com</td>
                        <td class="px-6 py-4">08123121312</td>
                        <td class="px-6 py-4">
                            <x-aktif-badge/>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-between space-x-2">
                                <x-view-button/>
                                <x-remove-button/>
                            </div>
                        </td>
                    </tr>
                    <tr class="tr-border-b">
                        <td class="px-6 py-4">4</td>
                        <td class="px-6 py-4">Jane Doe</td>
                        <td class="px-6 py-4">123456</td>
                        <td class="px-6 py-4">Jalan Jalan</td>
                        <td class="px-6 py-4">someemail@email.com</td>
                        <td class="px-6 py-4">08123121312</td>
                        <td class="px-6 py-4">
                            <x-nonaktif-badge/>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-between space-x-2">
                                <x-view-button/>
                                <x-remove-button/>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>


            <div class="flex flex-row items-center justify-between">
        <span class="text-sm text-gray-400">
            Menampilkan
            <span class="font-semibold text-gray-900">1</span>
            sampai
            <span class="font-semibold text-gray-900">7</span>
            dari
            <span class="font-semibold text-gray-900">100</span>
            entri
        </span>
                <div class="inline-flex mt-2 xs:mt-0 space-x-0.5">
                    <button
                        class="btn bg-teal-700 border-0 text-gray-50 justify-between self-center btn-sm w-24 hover:bg-teal-600 flex items-center rounded-r-none" role="button">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 5H1m0 0 4 4M1 5l4-4"/>
                        </svg>
                        Prev
                    </button>
                    <button
                        class="btn bg-teal-700 border-0 text-gray-50 justify-between self-center btn-sm w-24 hover:bg-teal-600 flex items-center rounded-l-none" role="button">
                        Next
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
@endsection
