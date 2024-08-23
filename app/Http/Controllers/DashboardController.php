<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->model = new Kegiatan();
    }
    public function index()
    {
        $jumlah_kegiatan = $this->model->countActiveKegiatan();
        $rerata_beban = rand(10, 50);
        $organik_terlibat = rand(0, 29);
        $mitra_terlibat = rand(0, 100);

        $kegiatan_periode_labels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
            'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];

        $kegiatan_periode_value = array_map(fn() => rand(1, 30), $kegiatan_periode_labels);

        $kegiatan_organik = Pegawai::getTugasPegawai();
        $kegiatan_organik_labels = $kegiatan_organik['nama'];
        $kegiatan_organik_value = $kegiatan_organik['tugas'];


        $perusahaan_kecamatan_labels = [
            'Pasar Rebo', 'Ciracas', 'Cipayung', 'Makasar', 'Kramat Jati',
            'Jatinegara', 'Duren Sawit', 'Cakung', 'Pulo Gadung', 'Matraman'
        ];

        $perusahaan_kecamatan_value = array_map(fn() => rand(1, 100), $perusahaan_kecamatan_labels);

        $kegiatan_fungsi_data = $this->model->countByAsalFungsi();
        $kegiatan_fungsi_labels = $kegiatan_fungsi_data->keys()->toArray();
        $kegiatan_fungsi_value = $kegiatan_fungsi_data->values()->toArray();

        return view('dashboard', [
            'jumlah_kegiatan' => $jumlah_kegiatan,
            'rerata_beban' => $rerata_beban,
            'organik_terlibat' => $organik_terlibat,
            'mitra_terlibat' => $mitra_terlibat,
            'kegiatan_periode_labels' => $kegiatan_periode_labels,
            'kegiatan_periode_value' => $kegiatan_periode_value,
            'kegiatan_organik_labels' => $kegiatan_organik_labels,
            'kegiatan_organik_value' => $kegiatan_organik_value,
            'perusahaan_kecamatan_labels' => $perusahaan_kecamatan_labels,
            'perusahaan_kecamatan_value' => $perusahaan_kecamatan_value,
            'kegiatan_fungsi_labels' => $kegiatan_fungsi_labels,
            'kegiatan_fungsi_value' => $kegiatan_fungsi_value,
        ]);
    }

}
