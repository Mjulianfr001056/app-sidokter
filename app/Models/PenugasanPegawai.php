<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanPegawai extends Model
{
    use HasFactory;

    protected $table = 'penugasan_pegawai';

    protected $fillable = [
        'petugas',
        'kegiatan',
        'tanggal_penugasan',
        'pemberi_tugas',
        'jabatan',
        'status',
        'volume',
        'satuan',
        'catatan',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'petugas');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan');
    }

    public function pemberiTugas()
    {
        return $this->belongsTo(Pegawai::class, 'pemberi_tugas');
    }

    public static function getAllByFungsi($fungsi, $paginate = 10)
    {
        return self::join('pegawai', 'penugasan_pegawai.petugas', '=', 'pegawai.id')
            ->join('kegiatan', 'penugasan_pegawai.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai AS pemberi_tugas_pegawai', 'penugasan_pegawai.pemberi_tugas', '=', 'pemberi_tugas_pegawai.id')
            ->where('pegawai.fungsi', $fungsi)
            ->select(
                'penugasan_pegawai.id',
                'pegawai.nama AS nama_pegawai',
                'kegiatan.nama AS nama_kegiatan',
                'pemberi_tugas_pegawai.nama AS nama_pemberi_tugas',
                'penugasan_pegawai.tanggal_penugasan',
                'penugasan_pegawai.volume',
                'penugasan_pegawai.satuan',
                'penugasan_pegawai.status'
            )->paginate($paginate);
    }

    public static function getById($id){
        return self::select('penugasan_pegawai.*', 'kegiatan.nama as nama_kegiatan', 'pemberi.nama as nama_pemberi_tugas', 'pelaksana.nama as pelaksana')
            ->join('kegiatan', 'penugasan_pegawai.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai as pemberi', 'penugasan_pegawai.pemberi_tugas', '=', 'pemberi.id')
            ->join('pegawai as pelaksana', 'penugasan_pegawai.petugas', '=', 'pelaksana.id')
            ->where('penugasan_pegawai.id', $id)
            ->first();
    }

    public static function getAllByUserId($userID){
        return self::select('penugasan_pegawai.*', 'kegiatan.nama as nama_kegiatan', 'pemberi.nama as nama_pemberi_tugas', 'pelaksana.nama as pelaksana')
            ->join('kegiatan', 'penugasan_pegawai.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai as pemberi', 'penugasan_pegawai.pemberi_tugas', '=', 'pemberi.id')
            ->join('pegawai as pelaksana', 'penugasan_pegawai.petugas', '=', 'pelaksana.id')
            ->where('penugasan_pegawai.petugas', $userID)
            ->get();
    }

}
