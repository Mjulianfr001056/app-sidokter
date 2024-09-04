<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManajemenSampelController extends Controller
{
    public function index()
    {
        $perusahaan_rank = Perusahaan::select('perusahaan.nama_usaha', 'perusahaan.kode_kbli', DB::raw('COUNT(kegiatan.id) as jumlah_kegiatan'))
            ->join('sampel', 'perusahaan.id', '=', 'sampel.perusahaan_id')
            ->join('kegiatan', 'kegiatan.id', '=', 'sampel.kegiatan_id')
            ->groupBy('perusahaan.id', 'perusahaan.nama_usaha', 'perusahaan.kode_kbli')
            ->orderByDesc('jumlah_kegiatan')
            ->take(10)
            ->get();

        $perusahaan_rank = $perusahaan_rank->map(function ($item, $index) {
            $item->rank = $index + 1;
            return $item;
        });

        $kegiatan_sampel = Kegiatan::withCount('sampel')
            ->having('sampel_count', '>', 0)
            ->paginate(25, ['id', 'nama', 'sampel_count']);

        return view('manajemen-sampel.index', compact('perusahaan_rank', 'kegiatan_sampel'));
    }
}
