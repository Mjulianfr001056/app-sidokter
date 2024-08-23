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
        $periodeOptions = ['bulanan', 'triwulanan', 'semesteran', 'tahunan'];
        $satuanOptions = [
            'Laporan', 'File', 'Kegiatan', 'Desa atau Kelurahan', 'Blok Sensus',
            'Peserta', 'Petugas', 'Rumah Tangga', 'Segmen', 'Perusahaan',
            'Usaha', 'Kecamatan', 'Plot', 'Perusahaan atau Usaha', 'Dokumen',
            'Sekolahan', 'Perusahaan atau Kontrakan', 'Pasar', 'Rumah Tangga (Upah PRT)',
            'Responden', 'Non Rumah Tangga', 'Objek', 'Paket', 'Konten',
            'Instansi', 'SLS'
        ];

        $selectedPeriode = $this->faker->optional()->randomElements($periodeOptions, $this->faker->numberBetween(1, count($periodeOptions)));
        $periode = empty($selectedPeriode) ? null : implode(',', $selectedPeriode);

        return [
            'nama' => $this->faker->sentence(),
            'asal_fungsi' => $this->faker->randomElement([
                'Subbag Umum', 'Statistik Produksi', 'Statistik Distribusi', 'Nerwilis', 'IPDS', 'Sosial']),
            'periode' => $periode,
            'tanggal_mulai' => $this->faker->optional()->date(),
            'tanggal_akhir' => $this->faker->optional()->date(),
            'target' => $this->faker->numberBetween(1, 1000),
            'satuan' => $this->faker->randomElement($satuanOptions),
            'harga_satuan' => $this->faker->optional()->numberBetween(1000, 1000000),
        ];
    }
}
