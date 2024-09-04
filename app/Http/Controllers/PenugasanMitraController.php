<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Mitra;
use App\Models\Pegawai;
use App\Models\PenugasanMitra;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PenugasanMitraController extends Controller implements RestControllerInterface
{
    public function show($id)
    {
        $detail_tugas = PenugasanMitra::getById($id);

        return view('penugasan-mitra-detail', compact('detail_tugas'));
    }

    public function create(): View
    {
        $daftar_kegiatan = Kegiatan::all(['id', 'nama', 'harga_satuan', 'satuan']);

        $daftar_kegiatan = $daftar_kegiatan->map(function ($item) {
            $encoded_data = json_encode([
                'id' => $item->id,
                'satuan' => $item->satuan,
            ]);

            return (object) [
                'id' => $encoded_data,
                'nama' => $item->nama,
            ];
        });

        $pilihan_petugas = Mitra::getTotalPendapatanFiltered();
        $daftar_pendapatan = Mitra::getTotalPendapatan();

        return view('penugasan-mitra-create', compact('daftar_pendapatan','pilihan_petugas', 'daftar_kegiatan'));
    }

    public function store(Request $request)
    {
        $pemberi_tugas = env('SESSION_USER_ID');
        $status = 'ditugaskan';
        $tanggal_penugasan = Carbon::now()->format('Y-m-d');
        $id_kegiatan = json_decode($request->get('kegiatan'))->id;

        $request->merge([
            'pemberi_tugas' => $pemberi_tugas,
            'kegiatan' => $id_kegiatan,
            'status' => $status,
            'tanggal_penugasan' => $tanggal_penugasan,
        ]);

        PenugasanMitra::create($request->except('_token', '_method'));

        return redirect()->route('beban-kerja-tugas');
    }

    public function edit($id): View
    {
        $detail_tugas = PenugasanMitra::getById($id);
        $pilihan_pelaksana = Mitra::all(['id', 'nama']);
        $pilihan_pemberi_tugas = Pegawai::all(['id', 'nama']);
        $pilihan_status = self::getStatusKegiatan();

        return view('penugasan-mitra-edit', compact('detail_tugas', 'pilihan_pelaksana', 'pilihan_pemberi_tugas', 'pilihan_status'));
    }

    public function update(Request $request, $id)
    {
        $tanggal_penugasan_converted = DateTime::createFromFormat('d-m-Y', $request->get('tanggal_penugasan'))->format('Y-m-d');
        $request->merge([
            'tanggal_penugasan' => $tanggal_penugasan_converted,
        ]);

        PenugasanMitra::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('penugasan-mitra-detail', ['id' => $id]);
    }

    public function delete($id)
    {
        PenugasanMitra::where('id', $id)->delete();

        return redirect()->route('beban-kerja-tugas');
    }
}
