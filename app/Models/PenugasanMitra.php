<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenugasanMitra extends Model
{
    use HasFactory;

    protected $table = 'penugasan_mitra';

    protected $fillable = [
        'petugas',
        'kegiatan',
        'tanggal_penugasan',
        'pemberi_tugas',
        'jabatan',
        'volume',
        'status',
        'catatan',
    ];

    // Relationships
    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'petugas');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan');
    }

    public function pemberiTugas()
    {
        return $this->belongsTo(Pegawai::class, 'pemberi_tugas');
    }

    public static function getAll($paginate = 10)
    {
        return  self::join('mitra', 'penugasan_mitra.petugas', '=', 'mitra.id')
            ->join('kegiatan', 'penugasan_mitra.kegiatan', '=', 'kegiatan.id')
            ->join('pegawai AS pemberi_tugas_pegawai', 'penugasan_mitra.pemberi_tugas', '=', 'pemberi_tugas_pegawai.id')
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
            ->paginate($paginate);
    }
}
