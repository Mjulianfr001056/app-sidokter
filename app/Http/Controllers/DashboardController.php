<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_kegiatan = rand(100, 400);
        $rerata_beban = rand(10, 50);
        $organik_terlibat = rand(0, 29);
        $mitra_terlibat = rand(0, 100);

        $kegiatan_periode_labels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
            'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];

        $kegiatan_periode_value = array_map(fn() => rand(1, 30), $kegiatan_periode_labels);


        $kegiatan_organik_labels = [
            'Alice Johnson', 'Bob Smith', 'Charlie Brown', 'Diana Prince', 'Edward Norton', 'Fiona Green',
            'George Wilson', 'Hannah Adams', 'Ian Clark', 'Jane Austin', 'Kyle Johnson', 'Lila Rose',
            'Mason Carter', 'Nina Patel', 'Oscar Lee', 'Paula Thompson', 'Quincy Adams', 'Rita Gomez',
            'Steve Harris', 'Tina Turner', 'Ulysses Grant', 'Vera Wang', 'William Taylor', 'Xena Knight',
            'Yvonne Davis', 'Zachary Miller'
        ];

        $kegiatan_organik_value = array_map(fn() => rand(1, 20), $kegiatan_organik_labels);


        $perusahaan_kecamatan_labels = [
            'Pasar Rebo', 'Ciracas', 'Cipayung', 'Makasar', 'Kramat Jati',
            'Jatinegara', 'Duren Sawit', 'Cakung', 'Pulo Gadung', 'Matraman'
        ];

        $perusahaan_kecamatan_value = array_map(fn() => rand(1, 100), $perusahaan_kecamatan_labels);


        $kegiatan_fungsi_labels = [
            'Umum', 'Produksi', 'Distribusi', 'Nerwilis', 'IPDS', 'Sosial'
        ];

        $kegiatan_fungsi_value = array_map(fn() => rand(1, 50), $kegiatan_fungsi_labels);

        // Pass data to the view
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
