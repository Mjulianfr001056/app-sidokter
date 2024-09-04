<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Mitra;
use App\Models\Pegawai;
use App\Models\PenugasanMitra;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenugasanMitraController extends Controller implements RestControllerInterface
{
    public function create(): View
    {
        $daftar_kegiatan = Kegiatan::all(['id', 'nama', 'harga_satuan', 'satuan']);

        $daftar_kegiatan = $daftar_kegiatan->map(function ($item) {
            return [
                'id' => json_encode([
                    'id' => $item->id,
                    'satuan' => $item->satuan,
                ]),
                'nama' => $item->nama,
            ];
        });

        $pilihan_pemberi_tugas = Pegawai::orderBy('fungsi', 'asc')->get(['id', 'nama']);
        $pilihan_petugas = Mitra::getTotalPendapatanFiltered();
        $daftar_pendapatan = Mitra::getTotalPendapatan();

        return view('penugasan-mitra-create', compact('daftar_pendapatan','pilihan_petugas', 'pilihan_pemberi_tugas', 'daftar_kegiatan'));
    }

    public function store(Request $request)
    {
        $penugasan = new PenugasanMitra();
        $id_kegiatan = json_decode($request->kegiatan)->id;

        $penugasan->petugas = $request->petugas;
        $penugasan->kegiatan = $id_kegiatan;
        $penugasan->pemberi_tugas = $request->pemberi_tugas;
        $penugasan->tanggal_penugasan = Carbon::now()->format('Y-m-d');
        $penugasan->status = 'ditugaskan';
        $penugasan->volume = $request->volume;
        $penugasan->catatan = $request->catatan;
        $penugasan->save();

        return redirect()->route('beban-kerja-tugas');
    }
    public function show($id)
    {
        $detail_tugas = PenugasanMitra::select('penugasan_mitra.*', 'kegiatan.nama as nama_kegiatan',
            'kegiatan.satuan as satuan_kegiatan','kegiatan.harga_satuan as harga_satuan_kegiatan',
            'pemberi.nama as nama_pemberi_tugas', 'pelaksana.nama as pelaksana')
            ->join('kegiatan', 'penugasan_mitra.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai as pemberi', 'penugasan_mitra.pemberi_tugas', '=', 'pemberi.id')
            ->join('mitra as pelaksana', 'penugasan_mitra.petugas', '=', 'pelaksana.id')
            ->where('penugasan_mitra.id', $id)
            ->first();

        return view('penugasan-mitra-detail', compact('detail_tugas'));
    }

    public function edit($id): View
    {
        $detail_tugas = PenugasanMitra::select('penugasan_mitra.*', 'kegiatan.nama as nama_kegiatan',
            'kegiatan.satuan as satuan_kegiatan','kegiatan.harga_satuan as harga_satuan_kegiatan',
            'pemberi.nama as nama_pemberi_tugas', 'pelaksana.nama as pelaksana')
            ->join('kegiatan', 'penugasan_mitra.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai as pemberi', 'penugasan_mitra.pemberi_tugas', '=', 'pemberi.id')
            ->join('mitra as pelaksana', 'penugasan_mitra.petugas', '=', 'pelaksana.id')
            ->where('penugasan_mitra.id', $id)
            ->first();

        $fungsi = 'nerwilis';

        $pilihan = DB::table('mitra')
            ->select('mitra.nama as nama_mitra', 'mitra.id as id_mitra')
            ->where('mitra.fungsi', $fungsi)
            ->get();

        return view('penugasan-mitra-edit', compact('detail_tugas', 'pilihan'));
    }

    public function update(Request $request, $id)
    {
        $tanggal_penugasan_converted = DateTime::createFromFormat('d-m-Y', $request->tanggal_penugasan)->format('Y-m-d');

        PenugasanMitra::where('id', $id)->update([
            'petugas' => $request->petugas,
            'tanggal_penugasan' => $tanggal_penugasan_converted,
            'volume' => $request->volume,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('penugasan-mitra-detail', ['id' => $id]);
    }

    public function delete($id)
    {
        PenugasanMitra::where('id', $id)->delete();

        return redirect()->route('beban-kerja-tugas');
    }
}
