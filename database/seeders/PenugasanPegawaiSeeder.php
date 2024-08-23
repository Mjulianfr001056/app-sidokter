<?php

namespace Database\Seeders;

use App\Models\PenugasanPegawai;
use Illuminate\Database\Seeder;

class PenugasanPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PenugasanPegawai::factory(100)->create();
    }
}
