<?php

namespace App\Http\Controllers;

use App\Models\PenugasanMitra;
use App\Models\PenugasanPegawai;
use App\Models\Tim;
use Illuminate\Support\Facades\DB;

class PenugasanController extends Controller
{
    public function index()
    {
        $fungsi = 'nerwilis';

        $ketua = DB::table('tim')
            ->join('pegawai', 'tim.anggota', '=', 'pegawai.id')
            ->select('tim.*', 'pegawai.nama as nama_pegawai')
            ->where('tim.fungsi', $fungsi)
            ->where('tim.status', 'ketua')
            ->first();

        $anggota = DB::table('tim')
            ->join('pegawai', 'tim.anggota', '=', 'pegawai.id')
            ->select('tim.*', 'pegawai.nama as nama_pegawai')
            ->where('tim.fungsi', $fungsi)
            ->where('tim.status', 'anggota')
            ->get();

        $tugas_tim = Tim::select('pegawai.nama as nama_pegawai', DB::raw('COUNT(kegiatan.id) as jumlah_kegiatan'))
            ->join('pegawai', 'tim.anggota', '=', 'pegawai.id')
            ->leftJoin('penugasan_pegawai', 'penugasan_pegawai.petugas', '=', 'pegawai.id')
            ->leftJoin('kegiatan', 'kegiatan.id', '=', 'penugasan_pegawai.kegiatan')
            ->where('tim.fungsi', $fungsi)
            ->where('tim.status', 'anggota')
            ->groupBy('tim.anggota', 'pegawai.nama')
            ->get();

        $daftarPenugasanTim = PenugasanPegawai::join('tim', 'penugasan_pegawai.petugas', '=', 'tim.anggota')
            ->join('pegawai', 'penugasan_pegawai.petugas', '=', 'pegawai.id')
            ->join('kegiatan', 'penugasan_pegawai.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai AS pemberi_tugas_pegawai', 'penugasan_pegawai.pemberi_tugas', '=', 'pemberi_tugas_pegawai.id')
            ->where('tim.fungsi', $fungsi)
            ->select(
                'pegawai.nama AS nama_pegawai',
                'kegiatan.nama AS nama_kegiatan',
                'pemberi_tugas_pegawai.nama AS nama_pemberi_tugas',
                'penugasan_pegawai.tanggal_penugasan',
                'penugasan_pegawai.status'
            )
            ->paginate(10);

        $daftarPenugasanMitra = PenugasanMitra::join('mitra', 'penugasan_mitra.petugas', '=', 'mitra.id')
            ->join('kegiatan', 'penugasan_mitra.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai AS pemberi_tugas_pegawai', 'penugasan_mitra.pemberi_tugas', '=', 'pemberi_tugas_pegawai.id')
            ->where('mitra.fungsi', $fungsi)
            ->select(
                'mitra.nama AS nama_mitra',
                'kegiatan.nama AS nama_kegiatan',
                'pemberi_tugas_pegawai.nama AS nama_pemberi_tugas',
                'penugasan_mitra.tanggal_penugasan',
                'penugasan_mitra.status'
            )
            ->paginate(5);

        return view('beban-kerja-tugas', compact(
            'fungsi', 'ketua', 'anggota',
            'tugas_tim', 'daftarPenugasanTim', 'daftarPenugasanMitra'));
    }

}
