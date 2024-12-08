<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->numerify('##############'),
            'nip_bps' => $this->faker->numerify('#########'),
            'nama' => $this->faker->name,
            'alias' => $this->faker->firstName(),
            'status' => $this->faker->randomElement(['Admin Kabupaten', 'Ketua Tim', 'Organik', 'Pimpinan']),
            'fungsi' => $this->faker->randomElement([
                'ipds',
                'statistik produksi',
                'statistik distribusi',
                'statistik sosial',
                'subbag umum',
                'nerwilis'
            ]),
            'jabatan_tim' => $this->faker->randomElement(['ketua', 'anggota']),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
