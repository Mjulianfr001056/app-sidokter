<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_wilayah');
            $table->foreign('kode_wilayah')->references('kode')->on('wilayah')
            ->onDelete('restrict')->onUpdate('cascade');

            $table->string('nama_usaha');
            $table->string('sls');
            $table->text('alamat');

            $table->enum('kode_kbli', [
                'A. Pertanian, Kehutanan dan Perikanan',
                'B. Pertambangan dan Penggalian',
                'C. Industri Pengolahan',
                'D. Pengadaan Listrik, Gas, Uap/Air Panas Dan Udara Dingin',
                'E. Treatment Air, Treatment Air Limbah, Treatment dan Pemulihan Material Sampah, dan Aktivitas Remediasi',
                'F. Konstruksi',
                'G. Perdagangan Besar Dan Eceran; Reparasi Dan Perawatan Mobil Dan Sepeda Motor',
                'H. Pengangkutan dan Pergudangan',
                'I. Penyediaan Akomodasi Dan Penyediaan Makan Minum',
                'J. Informasi Dan Komunikasi',
                'K. Aktivitas Keuangan dan Asuransi',
                'L. Real Estat',
                'M. Aktivitas Profesional, Ilmiah Dan Teknis',
                'N. Aktivitas Penyewaan dan Sewa Guna Usaha Tanpa Hak Opsi, Ketenagakerjaan, Agen Perjalanan dan Penunjang Usaha Lainnya',
                'O. Administrasi Pemerintahan, Pertahanan Dan Jaminan Sosial Wajib',
                'P. Pendidikan',
                'Q. Aktivitas Kesehatan Manusia Dan Aktivitas Sosial',
                'R. Kesenian, Hiburan Dan Rekreasi',
                'S. Aktivitas Jasa Lainnya',
                'T. Aktivitas Rumah Tangga Sebagai Pemberi Kerja; Aktivitas Yang Menghasilkan Barang Dan Jasa Oleh Rumah Tangga yang Digunakan untuk Memenuhi Kebutuhan Sendiri',
                'U. Aktivitas Badan Internasional Dan Badan Ekstra Internasional Lainnya',
            ]);

            $table->string('nama_cp')->nullable();
            $table->string('nomor_cp')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perusahaan');
    }
};
