<?php

namespace App\Http\Controllers;

use App\Models\TugasPegawai;
use Illuminate\Http\Request;

class TugasPegawaiController extends Controller
{
    public function show($id)
    {
        $tugas_pegawai = TugasPegawai::where('id', $id);
        return view('penugasan-detail-organik', compact('tugas_pegawai'));
    }
}
