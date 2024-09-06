<?php

namespace Database\Factories;

use App\Models\Sampel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<Sampel>
 */
class SampelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kegiatan_id' => DB::table('kegiatan')->inRandomOrder()->first()->id,
            'perusahaan_id' => DB::table('perusahaan')->inRandomOrder()->first()->id,
            'dibuat_oleh' => DB::table('pegawai')->inRandomOrder()->first()->id,
        ];
    }
}
