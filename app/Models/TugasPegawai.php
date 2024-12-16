<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasPegawai extends Model
{
    use HasFactory;
    protected $table =  'tugas_pegawai';

    protected $fillable = [
        'id',
        'penugasan_pegawai',
        'dikerjakan',
        'bukti',
        'status',
        'catatan',
    ];

    // Relasi 

    public function penugasanPegawai()
    {
        return $this->belongsTo(PenugasanPegawai::class, 'penugasanPegawai');
    }
}
