<?php

namespace Database\Seeders;

use App\Models\PenugasanMitra;
use Illuminate\Database\Seeder;

class PenugasanMitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         PenugasanMitra::factory(100)->create();
    }
}
