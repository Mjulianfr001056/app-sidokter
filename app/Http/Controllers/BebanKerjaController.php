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

        //$pegawai = Pegawai::all();
        $penugasanPegawai = PenugasanPegawai::where('kegiatan', $id)->get(); // Ambil semua data terkait
        $pegawai = $penugasanPegawai->pluck('pegawai');

        // Periksa jika ada data
        if ($penugasanPegawai->isNotEmpty()) {
            foreach ($penugasanPegawai as $item) {
                // Setiap $item adalah instance dari PenugasanPegawai
                $target = $item->target; // Properti 'target' ada pada setiap item
                $pegawaiNama = $item->pegawai ? $item->pegawai->nama : null; // Relasi pegawai
            }
        } else {
            $penugasanPegawai = null;
        }

        $penugasanMitra = PenugasanMitra::where('kegiatan', $id)->first();

        if ($penugasanMitra) {
            // Jika penugasan mitra ditemukan, memaginasikan relasi mitra (misalnya jika ada banyak mitra)
            $mitra = $penugasanMitra->mitra()->paginate(100);  // Memaginasikan mitra terkait

            // Sekarang Anda bisa memanggil currentPage() karena $mitra adalah objek LengthAwarePaginator
            $currentPage = $mitra->currentPage();
        } else {
            $mitra = null;
        }
        $kegiatan = Kegiatan::find($id);

        return view('penugasan-detail', compact(
            'pegawai',
            'mitra',
            'kegiatan',
            'id',
            'penugasanPegawai',
            'penugasanMitra',
        ));
    }

    public function showAll()
    {
        // Menggunakan model Kegiatan secara langsung
        $kegiatan = Kegiatan::paginate(10); // Paginasi 10 item per halaman
        return view('penugasan-all', compact('kegiatan'));
    }
}
