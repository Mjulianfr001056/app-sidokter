<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\PenugasanMitra;
use App\Models\PenugasanPegawai;
class BebanKerjaController extends Controller
{
    public function index()
    {
        $fungsi = env('SESSION_FUNGSI');

        $ketua = Pegawai::getKetuaByFungsi($fungsi);
        $anggota = Pegawai::getAnggotaByFungsi($fungsi);
        $tugas_tim = Pegawai::getJumlahKegiatanPerPegawaiByFungsi($fungsi);
        $daftarPenugasanTim = PenugasanPegawai::getAllByFungsi($fungsi);
        $daftarPenugasanMitra = PenugasanMitra::getAll();

        return view('beban-kerja-tugas', compact(
            'fungsi', 'ketua', 'anggota',
            'tugas_tim', 'daftarPenugasanTim', 'daftarPenugasanMitra'));
    }
}
