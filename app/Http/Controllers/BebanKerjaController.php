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
        $fungsi = env('SESSION_FUNGSI');

        $pegawai = Pegawai::all();
        $kegiatan = Kegiatan::getKegiatanById($id);
        $ketua = Pegawai::getKetuaByFungsi($fungsi);
        $anggota = Pegawai::getAnggotaByFungsi($fungsi);
        $tugas_tim = Pegawai::getJumlahKegiatanPerPegawaiByFungsi($fungsi);
        $daftarPenugasanTim = PenugasanPegawai::getAllByFungsi($fungsi);
        $daftarPenugasanMitra = PenugasanMitra::getAll();

        return view('beban-kerja-tugas', compact(
            'kegiatan',
            'id',
            'pegawai',
            'fungsi',
            'ketua',
            'anggota',
            'tugas_tim',
            'daftarPenugasanTim',
            'daftarPenugasanMitra'
        ));
    }

    public function showAll()
    {
        // Menggunakan model Kegiatan secara langsung
        $kegiatan = Kegiatan::paginate(10); // Paginasi 10 item per halaman
        return view('penugasan-all', compact('kegiatan'));
    }
}
