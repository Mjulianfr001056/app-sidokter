<?php

namespace Database\Factories;

use App\Models\Mitra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
        $posisiOptions = ['pendataan', 'pengolahan'];

        $selectedPosisi = $this->faker->randomElements($posisiOptions, $this->faker->numberBetween(1, count($posisiOptions)));
        $posisi = implode(',', $selectedPosisi);

        $kodeWilayah = DB::table('wilayah')->inRandomOrder()->value('kode');;

        return [
            'sobat_id' => $this->faker->unique()->numerify('############'),
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'email' => $this->faker->unique()->safeEmail,
            'kode_wilayah' => $kodeWilayah,
            'alamat_detail' => $this->faker->address,
            'posisi' => $posisi
        ];
    }
}
