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
            $table->string('kode_wilayah');
            $table->foreign('kode_wilayah')->references('kode')->on('wilayah')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->text('alamat_detail')->nullable();
            $table->string('posisi', 30);
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
