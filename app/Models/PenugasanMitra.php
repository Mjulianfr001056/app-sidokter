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
}
