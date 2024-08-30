<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $fillable = [
        'kode_wilayah',
        'nama_usaha',
        'sls',
        'alamat_detail',
        'kode_kbli',
        'nama_cp',
        'nomor_cp',
        'email',
    ];

    protected $casts = [
        'kode_wilayah' => 'string',
        'nama_usaha' => 'string',
        'sls' => 'string',
        'kode_kbli' => 'string',
        'nama_cp' => 'string',
        'nomor_cp' => 'string',
        'email' => 'string',
    ];

    public $timestamps = false;

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'kode_wilayah', 'kode');
    }
}
