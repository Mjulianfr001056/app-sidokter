<?php

namespace Database\Factories;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

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
        $startDate = Carbon::now()->subYear();
        $endDate = Carbon::now()->addYear();

        $tanggalMulai = $this->faker->dateTimeBetween($startDate, $endDate);

        $tanggalAkhir = $this->faker->dateTimeBetween($tanggalMulai, $endDate);

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
                'Subbag Umum', 'Statistik Produksi', 'Statistik Distribusi', 'Nerwilis', 'IPDS', 'Statistik Sosial']),
            'periode' => $periode,
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_akhir' => $tanggalAkhir,
            'target' => $this->faker->numberBetween(1, 1000),
            'satuan' => $this->faker->randomElement($satuanOptions),
            'harga_satuan' => $this->faker->optional()->numberBetween(1000, 200000),
            'banyak_sampel' => $this->faker->numberBetween(0, 100),
            'status_sampel' => $this->faker->optional()->randomElement(['menunggu', 'final'])
        ];
    }
}
