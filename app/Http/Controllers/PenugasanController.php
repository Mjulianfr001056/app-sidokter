<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\PenugasanMitra;
use App\Models\PenugasanPegawai;
use App\Models\Tim;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
                'penugasan_pegawai.id',
                'pegawai.nama AS nama_pegawai',
                'kegiatan.nama AS nama_kegiatan',
                'pemberi_tugas_pegawai.nama AS nama_pemberi_tugas',
                'penugasan_pegawai.tanggal_penugasan',
                'penugasan_pegawai.volume',
                'penugasan_pegawai.satuan',
                'penugasan_pegawai.status'
            )
            ->paginate(10);

        $daftarPenugasanMitra = PenugasanMitra::join('mitra', 'penugasan_mitra.petugas', '=', 'mitra.id')
            ->join('kegiatan', 'penugasan_mitra.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai AS pemberi_tugas_pegawai', 'penugasan_mitra.pemberi_tugas', '=', 'pemberi_tugas_pegawai.id')
            ->where('mitra.fungsi', $fungsi)
            ->select(
                'penugasan_mitra.id',
                'mitra.nama AS nama_mitra',
                'kegiatan.nama AS nama_kegiatan',
                'pemberi_tugas_pegawai.nama AS nama_pemberi_tugas',
                'penugasan_mitra.tanggal_penugasan',
                'penugasan_mitra.volume',
                'kegiatan.harga_satuan',
                'penugasan_mitra.status'
            )
            ->paginate(10);

        return view('beban-kerja-tugas', compact(
            'fungsi', 'ketua', 'anggota',
            'tugas_tim', 'daftarPenugasanTim', 'daftarPenugasanMitra'));
    }

    public function showOrganik($id)
    {
        $detail_tugas = PenugasanPegawai::select('penugasan_pegawai.*', 'kegiatan.nama as nama_kegiatan', 'pemberi.nama as nama_pemberi_tugas', 'pelaksana.nama as pelaksana')
            ->join('kegiatan', 'penugasan_pegawai.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai as pemberi', 'penugasan_pegawai.pemberi_tugas', '=', 'pemberi.id')
            ->join('pegawai as pelaksana', 'penugasan_pegawai.petugas', '=', 'pelaksana.id')
            ->where('penugasan_pegawai.id', $id)
            ->first();

        return view('penugasan-organik-detail', compact('detail_tugas'));
    }

    public function createOrganik()
    {
        $daftar_kegiatan = Kegiatan::select('id', 'nama')->get();

        $fungsi = 'nerwilis';

        $pilihan_petugas = DB::table('tim')
            ->join('pegawai', 'tim.anggota', '=', 'pegawai.id')
            ->select('pegawai.nama as nama_pegawai', 'pegawai.id as id_pegawai')
            ->where('tim.fungsi', $fungsi)
            ->get();

        return view('penugasan-organik-create', compact('pilihan_petugas', 'daftar_kegiatan'));
    }

    public function storeOrganik(Request $request)
    {
//        dd($request->all());
        $penugasan = new PenugasanPegawai();
        $penugasan->petugas = $request->petugas;
        $penugasan->kegiatan = $request->id_kegiatan;
        $penugasan->pemberi_tugas = 7;
        $penugasan->tanggal_penugasan = Carbon::now()->format('Y-m-d');
        $penugasan->status = 'ditugaskan';
        $penugasan->volume = $request->volume;
        $penugasan->satuan = $request->satuan;
        $penugasan->catatan = $request->catatan;
        $penugasan->save();



        return redirect()->route('beban-kerja-tugas');
    }

    public function editOrganik($id)
    {
        $detail_tugas = PenugasanPegawai::select('penugasan_pegawai.*', 'kegiatan.nama as nama_kegiatan','pemberi.nama as nama_pemberi_tugas', 'pelaksana.nama as pelaksana')
            ->join('kegiatan', 'penugasan_pegawai.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai as pemberi', 'penugasan_pegawai.pemberi_tugas', '=', 'pemberi.id')
            ->join('pegawai as pelaksana', 'penugasan_pegawai.petugas', '=', 'pelaksana.id')
            ->where('penugasan_pegawai.id', $id)
            ->first();

//        Nanti dynamic
        $fungsi = 'nerwilis';

        $pilihan = DB::table('tim')
            ->join('pegawai', 'tim.anggota', '=', 'pegawai.id')
            ->select('pegawai.nama as nama_pegawai', 'pegawai.id as id_pegawai')
            ->where('tim.fungsi', $fungsi)
            ->get();

        return view('penugasan-organik-edit', compact('detail_tugas', 'pilihan'));
    }

    public function updateOrganik(Request $request, $id)
    {
        $tanggal_penugasan_converted = \DateTime::createFromFormat('d-m-Y', $request->tanggal_penugasan)->format('Y-m-d');

        PenugasanPegawai::where('id', $id)->update([
            'petugas' => $request->petugas,
            'tanggal_penugasan' => $tanggal_penugasan_converted,
            'status' => $request->status,
            'volume' => $request->volume,
            'satuan' => $request->satuan,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('penugasan-organik-detail', ['id' => $id]);
    }

    public function deleteOrganik($id)
    {
        PenugasanPegawai::where('id', $id)->delete();

        return redirect()->route('beban-kerja-tugas');
    }

    public function createMitra()
    {
        $daftar_kegiatan = Kegiatan::select('id', 'nama', 'harga_satuan', 'satuan')->get();

        $fungsi = 'nerwilis';

        $pilihan_penugas = DB::table('tim')
            ->join('pegawai', 'tim.anggota', '=', 'pegawai.id')
            ->select('pegawai.nama as nama_pegawai', 'pegawai.id as id_pegawai')
            ->where('tim.fungsi', $fungsi)
            ->get();

        $pilihan_petugas = DB::table('mitra')
            ->select('mitra.nama as nama_mitra', 'mitra.id as id_mitra')
            ->where('mitra.fungsi', $fungsi)
            ->get();

        return view('penugasan-mitra-create', compact('pilihan_petugas', 'pilihan_penugas', 'daftar_kegiatan'));
    }

    public function storeMitra(Request $request)
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
    public function showMitra($id)
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

    public function editMitra($id)
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

    public function updateMitra(Request $request, $id)
    {
        $tanggal_penugasan_converted = \DateTime::createFromFormat('d-m-Y', $request->tanggal_penugasan)->format('Y-m-d');

        PenugasanMitra::where('id', $id)->update([
            'petugas' => $request->petugas,
            'tanggal_penugasan' => $tanggal_penugasan_converted,
            'volume' => $request->volume,
            'status' => $request->status,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('penugasan-mitra-detail', ['id' => $id]);
    }

    public function deleteMitra($id)
    {
        PenugasanMitra::where('id', $id)->delete();

        return redirect()->route('beban-kerja-tugas');
    }
}
