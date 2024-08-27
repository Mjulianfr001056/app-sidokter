<?php

namespace Database\Seeders;

use App\Models\Tim;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $uniqueFungsi = [
            'IPDS', 'Statistik Produksi', 'Statistik Distribusi',
            'Statistik Sosial', 'Subbag Umum', 'Nerwilis'
        ];

        foreach ($uniqueFungsi as $fungsi) {
            $pegawaiId = DB::table('pegawai')->inRandomOrder()->first()->id;

            Tim::create([
                'fungsi' => $fungsi,
                'anggota' => $pegawaiId,
                'status' => 'ketua',
            ]);
        }

        foreach ($uniqueFungsi as $fungsi) {
            for ($i = 0; $i < 4; $i++) {
                $pegawaiId = DB::table('pegawai')->inRandomOrder()->first()->id;

                Tim::create([
                    'fungsi' => $fungsi,
                    'anggota' => $pegawaiId,
                    'status' => 'anggota',
                ]);
            }
        }
    }
}
