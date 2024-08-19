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

}
