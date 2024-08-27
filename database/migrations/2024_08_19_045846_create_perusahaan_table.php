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
