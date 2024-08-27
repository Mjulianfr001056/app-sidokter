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
        Schema::create('tim', function (Blueprint $table) {
            $table->id();
            $table->enum('fungsi', [
                'IPDS', 'Statistik Produksi', 'Statistik Distribusi',
                'Statistik Sosial', 'Subbag Umum', 'Nerwilis']);
            $table->unsignedBigInteger('anggota');
            $table->enum('status', ['ketua', 'anggota']);

            $table->foreign('anggota')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tim');
    }
};
