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
}
