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
            'jabatan' => $this->faker->text(30),
            'golongan' => $this->faker->randomElement([
                'I/A', 'I/B', 'I/C', 'I/D',
                'II/A', 'II/B', 'II/C', 'II/D',
                'III/A', 'III/B', 'III/C', 'III/D',
                'IV/A', 'IV/B', 'IV/C', 'IV/D', 'IV/E',
                'I', 'II', 'III', 'IV', 'V',
                'VI', 'VII', 'VIII', 'IX', 'X',
                'XI', 'XII', 'XIII', 'XIV', 'XV',
                'XVI', 'XVII'
            ]),
            'status' => $this->faker->randomElement(['pns', 'pppk']),
            'fungsi' => $this->faker->randomElement([
                'ipds', 'statistik produksi', 'statistik distribusi',
                'statistik sosial', 'subbag umum', 'nerwilis'
            ]),
            'jabatan_tim' => $this->faker->randomElement(['ketua', 'anggota']),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
