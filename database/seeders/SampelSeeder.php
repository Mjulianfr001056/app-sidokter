<?php

namespace Database\Seeders;

use App\Models\Sampel;
use Illuminate\Database\Seeder;

class SampelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sampel::factory(100)->create();
    }
}
