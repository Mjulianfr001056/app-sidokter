<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => '3172010001', 'kecamatan' => 'PASAR REBO', 'kelurahan' => 'PEKAYON'],
            ['kode' => '3172010002', 'kecamatan' => 'PASAR REBO', 'kelurahan' => 'KALISARI'],
            ['kode' => '3172010003', 'kecamatan' => 'PASAR REBO', 'kelurahan' => 'BARU'],
            ['kode' => '3172010004', 'kecamatan' => 'PASAR REBO', 'kelurahan' => 'CIJANTUNG'],
            ['kode' => '3172010005', 'kecamatan' => 'PASAR REBO', 'kelurahan' => 'GEDONG'],
            ['kode' => '3172020001', 'kecamatan' => 'CIRACAS', 'kelurahan' => 'CIBUBUR'],
            ['kode' => '3172020002', 'kecamatan' => 'CIRACAS', 'kelurahan' => 'KELAPA DUA WETAN'],
            ['kode' => '3172020003', 'kecamatan' => 'CIRACAS', 'kelurahan' => 'CIRACAS'],
            ['kode' => '3172020004', 'kecamatan' => 'CIRACAS', 'kelurahan' => 'SUSUKAN'],
            ['kode' => '3172020005', 'kecamatan' => 'CIRACAS', 'kelurahan' => 'RAMBUTAN'],
            ['kode' => '3172030001', 'kecamatan' => 'CIPAYUNG', 'kelurahan' => 'PONDOK RANGGON'],
            ['kode' => '3172030002', 'kecamatan' => 'CIPAYUNG', 'kelurahan' => 'CILANGKAP'],
            ['kode' => '3172030003', 'kecamatan' => 'CIPAYUNG', 'kelurahan' => 'MUNJUL'],
            ['kode' => '3172030004', 'kecamatan' => 'CIPAYUNG', 'kelurahan' => 'CIPAYUNG'],
            ['kode' => '3172030005', 'kecamatan' => 'CIPAYUNG', 'kelurahan' => 'SETU'],
            ['kode' => '3172030006', 'kecamatan' => 'CIPAYUNG', 'kelurahan' => 'BAMBU APUS'],
            ['kode' => '3172030007', 'kecamatan' => 'CIPAYUNG', 'kelurahan' => 'CEGER'],
            ['kode' => '3172030008', 'kecamatan' => 'CIPAYUNG', 'kelurahan' => 'LUBANG BUAYA'],
            ['kode' => '3172040001', 'kecamatan' => 'MAKASAR', 'kelurahan' => 'PINANG RANTI'],
            ['kode' => '3172040002', 'kecamatan' => 'MAKASAR', 'kelurahan' => 'MAKASAR'],
            ['kode' => '3172040003', 'kecamatan' => 'MAKASAR', 'kelurahan' => 'KEBON PALA'],
            ['kode' => '3172040004', 'kecamatan' => 'MAKASAR', 'kelurahan' => 'HALIM PERDANA KUSUMAH'],
            ['kode' => '3172040005', 'kecamatan' => 'MAKASAR', 'kelurahan' => 'CIPINANG MELAYU'],
            ['kode' => '3172050001', 'kecamatan' => 'KRAMAT JATI', 'kelurahan' => 'BALE KAMBANG'],
            ['kode' => '3172050002', 'kecamatan' => 'KRAMAT JATI', 'kelurahan' => 'BATU AMPAR'],
            ['kode' => '3172050003', 'kecamatan' => 'KRAMAT JATI', 'kelurahan' => 'TENGAH'],
            ['kode' => '3172050004', 'kecamatan' => 'KRAMAT JATI', 'kelurahan' => 'DUKUH'],
            ['kode' => '3172050005', 'kecamatan' => 'KRAMAT JATI', 'kelurahan' => 'KRAMAT JATI'],
            ['kode' => '3172050006', 'kecamatan' => 'KRAMAT JATI', 'kelurahan' => 'CILILITAN'],
            ['kode' => '3172050007', 'kecamatan' => 'KRAMAT JATI', 'kelurahan' => 'CAWANG'],
            ['kode' => '3172060001', 'kecamatan' => 'JATINEGARA', 'kelurahan' => 'BIDARA CINA'],
            ['kode' => '3172060002', 'kecamatan' => 'JATINEGARA', 'kelurahan' => 'CIPINANG CEMPEDAK'],
            ['kode' => '3172060003', 'kecamatan' => 'JATINEGARA', 'kelurahan' => 'CIPINANG BESAR SELATAN'],
            ['kode' => '3172060004', 'kecamatan' => 'JATINEGARA', 'kelurahan' => 'CIPINANG MUARA'],
            ['kode' => '3172060005', 'kecamatan' => 'JATINEGARA', 'kelurahan' => 'CIPINANG BESAR UTARA'],
            ['kode' => '3172060006', 'kecamatan' => 'JATINEGARA', 'kelurahan' => 'RAWA BUNGA'],
            ['kode' => '3172060007', 'kecamatan' => 'JATINEGARA', 'kelurahan' => 'BALI MESTER'],
            ['kode' => '3172060008', 'kecamatan' => 'JATINEGARA', 'kelurahan' => 'KAMPUNG MELAYU'],
            ['kode' => '3172070001', 'kecamatan' => 'DUREN SAWIT', 'kelurahan' => 'PONDOK BAMBU'],
            ['kode' => '3172070002', 'kecamatan' => 'DUREN SAWIT', 'kelurahan' => 'DUREN SAWIT'],
            ['kode' => '3172070003', 'kecamatan' => 'DUREN SAWIT', 'kelurahan' => 'PONDOK KELAPA'],
            ['kode' => '3172070004', 'kecamatan' => 'DUREN SAWIT', 'kelurahan' => 'PONDOK KOPI'],
            ['kode' => '3172070005', 'kecamatan' => 'DUREN SAWIT', 'kelurahan' => 'MALAKA JAYA'],
            ['kode' => '3172070006', 'kecamatan' => 'DUREN SAWIT', 'kelurahan' => 'MALAKA SARI'],
            ['kode' => '3172070007', 'kecamatan' => 'DUREN SAWIT', 'kelurahan' => 'KLENDER'],
            ['kode' => '3172080001', 'kecamatan' => 'CAKUNG', 'kelurahan' => 'JATINEGARA'],
            ['kode' => '3172080002', 'kecamatan' => 'CAKUNG', 'kelurahan' => 'PENGGILINGAN'],
            ['kode' => '3172080003', 'kecamatan' => 'CAKUNG', 'kelurahan' => 'PULO GEBANG'],
            ['kode' => '3172080004', 'kecamatan' => 'CAKUNG', 'kelurahan' => 'UJUNG MENTENG'],
            ['kode' => '3172080005', 'kecamatan' => 'CAKUNG', 'kelurahan' => 'CAKUNG TIMUR'],
            ['kode' => '3172080006', 'kecamatan' => 'CAKUNG', 'kelurahan' => 'CAKUNG BARAT'],
            ['kode' => '3172080007', 'kecamatan' => 'CAKUNG', 'kelurahan' => 'RAWA TERATE'],
            ['kode' => '3172090001', 'kecamatan' => 'PULO GADUNG', 'kelurahan' => 'PISANGAN TIMUR'],
            ['kode' => '3172090002', 'kecamatan' => 'PULO GADUNG', 'kelurahan' => 'CIPINANG'],
            ['kode' => '3172090003', 'kecamatan' => 'PULO GADUNG', 'kelurahan' => 'JATINEGARA KAUM'],
            ['kode' => '3172090004', 'kecamatan' => 'PULO GADUNG', 'kelurahan' => 'JATI'],
            ['kode' => '3172090005', 'kecamatan' => 'PULO GADUNG', 'kelurahan' => 'RAWAMANGUN'],
            ['kode' => '3172090006', 'kecamatan' => 'PULO GADUNG', 'kelurahan' => 'KAYU PUTIH'],
            ['kode' => '3172090007', 'kecamatan' => 'PULO GADUNG', 'kelurahan' => 'PULO GADUNG'],
            ['kode' => '3172100001', 'kecamatan' => 'MATRAMAN', 'kelurahan' => 'KEBON MANGGIS'],
            ['kode' => '3172100002', 'kecamatan' => 'MATRAMAN', 'kelurahan' => 'PAL MERIEM'],
            ['kode' => '3172100003', 'kecamatan' => 'MATRAMAN', 'kelurahan' => 'PISANGAN BARU'],
            ['kode' => '3172100004', 'kecamatan' => 'MATRAMAN', 'kelurahan' => 'KAYU MANIS'],
            ['kode' => '3172100005', 'kecamatan' => 'MATRAMAN', 'kelurahan' => 'UTAN KAYU SELATAN'],
            ['kode' => '3172100006', 'kecamatan' => 'MATRAMAN', 'kelurahan' => 'UTAN KAYU UTARA'],
        ];

        DB::table('wilayah')->insert($data);
    }
}
