<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $fillable = [
        'nama',
        'asal_fungsi',
        'periode',
        'tanggal_mulai',
        'tanggal_akhir',
        'target',
        'satuan',
        'harga_satuan'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_akhir' => 'date',
        'harga_satuan' => 'integer',
    ];

    public function penugasanPegawai()
    {
        return $this->hasMany(PenugasanPegawai::class, 'kegiatan');
    }

    public function penugasanMitra()
    {
        return $this->hasMany(PenugasanMitra::class, 'kegiatan');
    }

    public static function countActiveKegiatan()
    {
        $today = Carbon::today();

        return self::where('tanggal_mulai', '<', $today)
            ->where('tanggal_akhir', '>', $today)
            ->count();
    }

    public static function countByAsalFungsi()
    {
        return self::select('asal_fungsi')
            ->selectRaw('count(*) as total')
            ->groupBy('asal_fungsi')
            ->get()
            ->keyBy('asal_fungsi')
            ->map->total;
    }
}
