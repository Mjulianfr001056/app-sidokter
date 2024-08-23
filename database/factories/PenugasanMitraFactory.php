<?php

namespace Database\Factories;

use App\Models\PenugasanMitra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<PenugasanMitra>
 */
class PenugasanMitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'petugas' => DB::table('mitra')->inRandomOrder()->first()->id,
            'kegiatan' => DB::table('kegiatan')->inRandomOrder()->first()->id,
            'tanggal_penugasan' => $this->faker->date(),
            'pemberi_tugas' => DB::table('pegawai')->inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['ditugaskan', 'proses', 'selesai']),
            'catatan' => $this->faker->sentence(),
        ];
    }
}
