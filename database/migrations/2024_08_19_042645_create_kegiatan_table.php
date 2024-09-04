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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->string('asal_fungsi', 50);
            $table->string('periode', 50)->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_akhir')->nullable();
            $table->unsignedInteger('target')->nullable();
            $table->string('satuan', 30);
            $table->unsignedInteger('harga_satuan')->nullable();
            $table->unsignedInteger('banyak_sampel')->default(0);
            $table->enum('status_sampel', ['menunggu', 'final'])->nullable();

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
        Schema::dropIfExists('kegiatan');
    }
};
