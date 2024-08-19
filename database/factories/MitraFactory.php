<?php

namespace Database\Factories;

use App\Models\Mitra;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mitra>
 */
class MitraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sobat_id' => $this->faker->unique()->numerify('############'),
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'email' => $this->faker->unique()->safeEmail,
            'posisi' => $this->faker->randomElement(['pendataan', 'pengolahan', 'pendataan dan pengolahan']),
        ];
    }
}
