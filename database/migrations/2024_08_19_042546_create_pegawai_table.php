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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();

            $table->string('nip', 18);
            $table->string('nip_bps', 9);
            $table->string('nama', 120);
            $table->string('alias', 20);

            $table->enum('status', ['Admin Kabupaten', 'Ketua Tim', 'Organik', 'Pimpinan']);
            $table->enum('fungsi', [
                'ipds',
                'statistik produksi',
                'statistik distribusi',
                'statistik sosial',
                'subbag umum',
                'nerwilis'
            ]);

            $table->enum('jabatan_tim', [
                'ketua',
                'anggota'
            ]);

            $table->timestamps();

            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
