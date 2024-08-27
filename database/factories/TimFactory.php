<?php

namespace Database\Factories;

use App\Models\Tim;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<Tim>
 */
class TimFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fungsi' => $this->faker->randomElement([
                'IPDS', 'Statistik Produksi', 'Statistik Distribusi',
                'Statistik Sosial', 'Subbag Umum', 'Nerwilis'
            ]),
            'anggota' => DB::table('pegawai')->inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['ketua', 'anggota']),
        ];
    }
}
