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
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            $table->string('sobat_id', 12);
            $table->string('nama', 150);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('email', 50);
            $table->string('kecamatan', 15)->nullable();
            $table->string('kelurahan', 25)->nullable();
            $table->text('alamat_detail')->nullable();
            $table->string('posisi', 30);
            $table->enum('fungsi', [
                'IPDS', 'Statistik Produksi', 'Statistik Distribusi',
                'Statistik Sosial', 'Subbag Umum', 'Nerwilis'
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitra');
    }
};
