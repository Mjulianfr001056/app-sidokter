<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\PenugasanMitra;
use App\Models\PenugasanPegawai;
use App\Models\Tim;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenugasanPegawaiController extends Controller implements RestControllerInterface
{
    public function show($id)
    {
        $detail_tugas = PenugasanPegawai::getById($id);

        return view('penugasan-organik-detail', compact('detail_tugas'));
    }

    public function create(): View
    {
        $daftar_kegiatan = Kegiatan::all(['id', 'nama']);
        $pilihan_petugas = Pegawai::orderBy('fungsi', 'asc')->get(['id', 'nama']);
        $satuan_kegiatan = self::getSatuanKegiatan();

        return view('penugasan-organik-create', compact('pilihan_petugas', 'daftar_kegiatan', 'satuan_kegiatan'));
    }

    public function store(Request $request)
    {
        $pemberi_tugas = env('SESSION_USER_ID');
        $status = 'ditugaskan';
        $tanggal_penugasan = Carbon::now()->format('Y-m-d');

        $request->merge([
            'pemberi_tugas' => $pemberi_tugas,
            'status' => $status,
            'tanggal_penugasan' => $tanggal_penugasan,
        ]);
        PenugasanPegawai::create($request->except('_token', '_method'));

        return redirect()->route('beban-kerja-tugas');
    }

    public function edit($id): View
    {
        $detail_tugas = PenugasanPegawai::getById($id);
        $satuan_kegiatan = self::getSatuanKegiatan();
        $status_kegiatan = self::getStatusKegiatan();

        $pilihan = Pegawai::orderBy('fungsi', 'asc')->get(['id', 'nama']);

        return view('penugasan-organik-edit', compact('detail_tugas', 'pilihan', 'satuan_kegiatan', 'status_kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $tanggal_penugasan_converted = DateTime::createFromFormat('d-m-Y', $request->get('tanggal_penugasan'))->format('Y-m-d');
        $request->merge([
            'tanggal_penugasan' => $tanggal_penugasan_converted,
        ]);
        PenugasanPegawai::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('penugasan-organik-detail', ['id' => $id]);
    }

    public function delete($id)
    {
        PenugasanPegawai::where('id', $id)->delete();

        return redirect()->route('beban-kerja-tugas');
    }
}
