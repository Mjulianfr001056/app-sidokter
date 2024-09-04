<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pegawai;
use App\Models\PenugasanMitra;
use App\Models\PenugasanPegawai;
use App\Models\Tim;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenugasanController extends Controller
{
    public function index()
    {
        $fungsi = env('SESSION_FUNGSI');

        $ketua = Pegawai::getKetuaByFungsi($fungsi);
        $anggota = Pegawai::getAnggotaByFungsi($fungsi);
        $tugas_tim = Pegawai::getJumlahKegiatanPerPegawaiByFungsi($fungsi);
        $daftarPenugasanTim = PenugasanPegawai::getAllByFungsi($fungsi);
        $daftarPenugasanMitra = PenugasanMitra::getAll();

        return view('beban-kerja-tugas', compact(
            'fungsi', 'ketua', 'anggota',
            'tugas_tim', 'daftarPenugasanTim', 'daftarPenugasanMitra'));
    }

    public function showOrganik($id)
    {
        $detail_tugas = PenugasanPegawai::getById($id);

        return view('penugasan-organik-detail', compact('detail_tugas'));
    }

    public function createOrganik()
    {
        $daftar_kegiatan = Kegiatan::all(['id', 'nama']);
        $pilihan_petugas = Pegawai::orderBy('fungsi', 'asc')->get(['id', 'nama']);
        $satuan_kegiatan = self::getSatuanKegiatan();

        return view('penugasan-organik-create', compact('pilihan_petugas', 'daftar_kegiatan', 'satuan_kegiatan'));
    }

    public function storeOrganik(Request $request)
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

    public function editOrganik($id)
    {
        $detail_tugas = PenugasanPegawai::getById($id);
        $satuan_kegiatan = self::getSatuanKegiatan();
        $status_kegiatan = self::getStatusKegiatan();

        $pilihan = Pegawai::orderBy('fungsi', 'asc')->get(['id', 'nama']);

        return view('penugasan-organik-edit', compact('detail_tugas', 'pilihan', 'satuan_kegiatan', 'status_kegiatan'));
    }

    public function updateOrganik(Request $request, $id)
    {
        $tanggal_penugasan_converted = DateTime::createFromFormat('d-m-Y', $request->get('tanggal_penugasan'))->format('Y-m-d');
        $request->merge([
            'tanggal_penugasan' => $tanggal_penugasan_converted,
        ]);
        PenugasanPegawai::where('id', $id)->update($request->except('_token', '_method'));

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
            ->select('mitra.nama as nama_mitra', 'mitra.id as id_mitra',
                DB::raw('SUM(kegiatan.harga_satuan * penugasan_mitra.volume) as total_pendapatan'))
            ->leftJoin('penugasan_mitra', 'mitra.id', '=', 'penugasan_mitra.petugas')
            ->join('kegiatan', 'penugasan_mitra.kegiatan', '=', 'kegiatan.id')
            ->where('mitra.fungsi', $fungsi)
            ->groupBy('mitra.nama', 'mitra.id')
            ->havingRaw('SUM(kegiatan.harga_satuan * penugasan_mitra.volume) <= ? OR SUM(kegiatan.harga_satuan * penugasan_mitra.volume) IS NULL', [4200000])
            ->get();


        $daftar_pendapatan = DB::table('mitra')
            ->select('mitra.nama as nama_mitra', 'mitra.fungsi',
                DB::raw('SUM(kegiatan.harga_satuan * penugasan_mitra.volume) as total_pendapatan'))
            ->leftJoin('penugasan_mitra', 'mitra.id', '=', 'penugasan_mitra.petugas')
            ->join('kegiatan', 'penugasan_mitra.kegiatan', '=', 'kegiatan.id')
            ->where('mitra.fungsi', $fungsi)
            ->groupBy('mitra.nama', 'mitra.fungsi')
            ->orderBy('total_pendapatan', 'desc')
            ->get();

        return view('penugasan-mitra-create', compact('daftar_pendapatan','pilihan_petugas', 'pilihan_penugas', 'daftar_kegiatan'));
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

    public function deleteMitra($id)
    {
        PenugasanMitra::where('id', $id)->delete();

        return redirect()->route('beban-kerja-tugas');
    }
}
