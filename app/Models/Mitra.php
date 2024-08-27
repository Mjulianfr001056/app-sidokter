<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;


    protected $table = 'mitra';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'sobat_id',
        'nama',
        'jenis_kelamin',
        'email',
        'posisi',
        'fungsi',
    ];

    protected $casts = [
        'jenis_kelamin' => 'string',
        'posisi' => 'string',
        'fungsi' => 'string',
    ];

    public function penugasanMitra()
    {
        return $this->hasMany(PenugasanMitra::class, 'petugas');
    }

    public static function countMitraTerlibatKegiatan()
    {
        return self::has('penugasanMitra')->count();
    }
}
