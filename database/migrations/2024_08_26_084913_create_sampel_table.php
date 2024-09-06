<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sampel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kegiatan_id')->nullable();
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->unsignedBigInteger('dibuat_oleh')->nullable();

            $table->foreign('kegiatan_id')->references('id')->on('kegiatan')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('perusahaan_id')->references('id')->on('perusahaan')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('dibuat_oleh')->references('id')->on('pegawai')
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampel');
    }
};
