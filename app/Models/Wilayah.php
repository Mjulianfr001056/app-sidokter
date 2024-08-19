<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayah';
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = [
        'kode',
        'kecamatan',
        'kelurahan'
    ];

    public function perusahaan()
    {
        return $this->hasMany(Perusahaan::class, 'kode_wilayah', 'kode');
    }
}
