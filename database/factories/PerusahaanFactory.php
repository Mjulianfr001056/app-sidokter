<?php

namespace Database\Factories;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory<Perusahaan>
 */
class PerusahaanFactory extends Factory
{
    protected $model = Perusahaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kodeWilayah = DB::table('wilayah')->inRandomOrder()->value('kode');

        return [
            'idsbr' => $this->faker->unique()->numerify(str_repeat('#', $this->faker->numberBetween(4, 9))),
            'kode_wilayah' => $this->faker->optional()->randomElement([$kodeWilayah, null]),
            'nama_usaha' => $this->faker->company,
            'sls' => $this->faker->optional(0.1)->city(),
            'alamat_detail' => $this->faker->address,
            'kode_kbli' => $this->faker->randomElement([
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
                'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
                'U'
            ]),
            'nama_cp' => $this->faker->optional(0.3)->name,
            'nomor_cp' => $this->faker->optional(0.3)->phoneNumber,
            'email' => $this->faker->optional(0.3)->safeEmail,
        ];
    }
}
