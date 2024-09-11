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
            $table->string('idsbr', 15)->unique();
            $table->string('kode_wilayah')->nullable();
            $table->foreign('kode_wilayah')
                ->references('kode')->on('wilayah')
                ->nullOnDelete()->cascadeOnUpdate();

            $table->string('nama_usaha');
            $table->string('sls')->nullable();
            $table->text('alamat_detail');

            $table->enum('kode_kbli', [
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J',
                'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
                'U'
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
