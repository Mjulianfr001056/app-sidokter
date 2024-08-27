<?php

namespace Database\Factories;

use App\Models\PenugasanPegawai;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<PenugasanPegawai>
 */
class PenugasanPegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'petugas' => DB::table('pegawai')->inRandomOrder()->first()->id,
            'kegiatan' => DB::table('kegiatan')->inRandomOrder()->first()->id,
            'tanggal_penugasan' => $this->faker->date(),
            'pemberi_tugas' => DB::table('pegawai')->inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['ditugaskan', 'proses', 'selesai']),
            'volume' => $this->faker->numberBetween(1, 10),
            'satuan' => $this->faker->optional()->randomElement(['OH', 'OK']),
            'catatan' => $this->faker->sentence(),
        ];
    }
}
