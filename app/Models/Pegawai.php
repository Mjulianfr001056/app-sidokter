<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'nip',
        'nip_bps',
        'nama',
        'alias',
        'jabatan',
        'golongan',
        'status'
    ];

    protected $casts = [
        'golongan' => 'string',
        'status' => 'string',
    ];

    public function penugasanPegawai()
    {
        return $this->hasMany(PenugasanPegawai::class, 'petugas');
    }

    public static function getTugasPegawai()
    {
        $data = self::withCount('penugasanPegawai')->get();

        $sortedData = $data->sortByDesc('penugasan_pegawai_count');

        $names = $sortedData->pluck('nama');
        $tasks = $sortedData->pluck('penugasan_pegawai_count');

        return [
            'nama' => $names->toArray(),
            'tugas' => $tasks->toArray(),
        ];
    }


}
