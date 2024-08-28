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
        Schema::create('penugasan_pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petugas')->nullable();
            $table->unsignedBigInteger('kegiatan')->nullable();
            $table->date('tanggal_penugasan');
            $table->unsignedBigInteger('pemberi_tugas')->nullable();
            $table->enum('status', ['ditugaskan', 'proses', 'selesai']);
            $table->unsignedInteger('volume');
            $table->enum('satuan', ['oh','ok'])->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('petugas')->references('id')->on('pegawai')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('kegiatan')->references('id')->on('kegiatan')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('pemberi_tugas')->references('id')->on('pegawai')->onDelete('set null')->onUpdate('cascade');
        });

        Schema::create('penugasan_mitra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petugas')->nullable();
            $table->unsignedBigInteger('kegiatan')->nullable();
            $table->date('tanggal_penugasan');
            $table->unsignedBigInteger('pemberi_tugas')->nullable();
            $table->unsignedInteger('volume');
            $table->enum('status', ['ditugaskan', 'proses', 'selesai']);
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('petugas')->references('id')->on('mitra')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('kegiatan')->references('id')->on('kegiatan')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('pemberi_tugas')->references('id')->on('pegawai')->onDelete('set null')->onUpdate('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_pegawai');
        Schema::dropIfExists('penugasan_mitra');
    }
};
