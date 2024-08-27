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
        $kodeWilayah = DB::table('wilayah')->inRandomOrder()->value('kode');;

        return [
            'kode_wilayah' => $kodeWilayah,
            'nama_usaha' => $this->faker->company,
            'sls' => $this->faker->word,
            'alamat' => $this->faker->address,
            'kode_kbli' => $this->faker->randomElement([
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
                'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
                'U'
            ]),
            'nama_cp' => $this->faker->name,
            'nomor_cp' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
        ];
    }
}
