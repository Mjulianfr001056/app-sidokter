<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\PenugasanMitra;
use App\Models\PenugasanPegawai;

class BebanKerjaController extends Controller
{
    public function index()
    {
        $fungsi = env('SESSION_FUNGSI');

        $pegawai = Pegawai::all();
        //$kegiatan = Kegiatan::getKegiatanById($id);
        $ketua = Pegawai::getKetuaByFungsi($fungsi);
        $anggota = Pegawai::getAnggotaByFungsi($fungsi);
        $tugas_tim = Pegawai::getJumlahKegiatanPerPegawaiByFungsi($fungsi);
        $daftarPenugasanTim = PenugasanPegawai::getAllByFungsi($fungsi);
        $daftarPenugasanMitra = PenugasanMitra::getAll();

        return view('beban-kerja-tugas', compact(
            'pegawai',
            'fungsi',
            'ketua',
            'anggota',
            'tugas_tim',
            'daftarPenugasanTim',
            'daftarPenugasanMitra'
        ));
    }

    public function show($id)
    {
        // Ambil data PenugasanPegawai dan gunakan eager loading untuk relasi pegawai
        $penugasanPegawai = PenugasanPegawai::with('pegawai') // Memuat relasi 'pegawai'
            ->where('kegiatan', $id)
            ->get(); // Mengambil data sebagai Collection, bukan array

        // Ambil data PenugasanMitra dan gunakan eager loading untuk relasi mitra
        $penugasanMitra = PenugasanMitra::with('mitra') // Memuat relasi 'mitra'
            ->where('kegiatan', $id)
            ->get(); // Mengambil data sebagai Collection, bukan array

        // Periksa jika data PenugasanPegawai tidak kosong
        if ($penugasanPegawai->isNotEmpty()) {
            // Map untuk mendapatkan nama pegawai
            $pegawai = $penugasanPegawai->map(function ($item) {
                return optional($item->pegawai)->nama; // Mengambil nama pegawai jika ada
            });
        } else {
            $pegawai = []; // Jika tidak ada data, set array kosong
        }

        // Periksa jika data PenugasanMitra tidak kosong
        if ($penugasanMitra->isNotEmpty()) {
            // Map untuk mendapatkan nama mitra
            $mitra = $penugasanMitra->map(function ($item) {
                return optional($item->mitra)->nama; // Mengambil nama mitra jika ada
            });
        } else {
            $mitra = []; // Jika tidak ada data, set array kosong
        }

        // Ambil data kegiatan
        $kegiatan = Kegiatan::find($id);

        return view('penugasan-detail', compact(
            'pegawai', // Mengirim koleksi nama pegawai
            'mitra',   // Mengirim koleksi nama mitra
            'kegiatan', // Mengirim data kegiatan
            'id', // Mengirim id kegiatan
            'penugasanPegawai', // Mengirim semua data penugasan pegawai
            'penugasanMitra'    // Mengirim semua data penugasan mitra
        ));
    }




    public function showAll()
    {
        // Menggunakan model Kegiatan secara langsung
        $kegiatan = Kegiatan::paginate(10); // Paginasi 10 item per halaman
        return view('penugasan-all', compact('kegiatan'));
    }
}
