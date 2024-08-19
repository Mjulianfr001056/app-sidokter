<?php

namespace Database\Factories;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'asal_fungsi' => $this->faker->word,
            'periode' => $this->faker->optional()->word,
            'tanggal_mulai' => $this->faker->optional()->date(),
            'tanggal_akhir' => $this->faker->optional()->date(),
            'target' => $this->faker->optional()->word,
            'satuan' => $this->faker->word,
            'harga_satuan' => $this->faker->optional()->numberBetween(1000, 1000000),
        ];
    }
}
