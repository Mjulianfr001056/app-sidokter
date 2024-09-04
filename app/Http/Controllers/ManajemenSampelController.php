<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Perusahaan;
use App\Models\Sampel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManajemenSampelController extends Controller
{
    public function index()
    {
        $ranking = Perusahaan::getTopSampledPerusahaan();
        $kegiatan = Kegiatan::select('id', 'nama', 'banyak_sampel', 'status_sampel')
            ->paginate(25);

        return view('manajemen-sampel.index', compact('ranking', 'kegiatan'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        $daftar_sampel = Sampel::getDaftarSampel($id);
        return view('manajemen-sampel.details', compact('kegiatan', 'daftar_sampel'));
    }

    public function edit($id){
        return view('manajemen-sampel.edit');
    }

    public function update(Request $request, $id){

        return redirect()->route('sampel-index');
    }
}
