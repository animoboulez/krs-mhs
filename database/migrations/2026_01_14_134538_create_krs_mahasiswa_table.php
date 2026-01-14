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
        Schema::create('krs_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('npm', 15);
            $table->unsignedBigInteger('penawaran_krs_id');
            $table->string('tahun_ajaran', 9)->nullable();

            $table->timestamps();

            $table->foreign('npm')->references('npm')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('penawaran_krs_id')->references('id')->on('penawaran_krs')->onDelete('cascade');

            $table->unique(['npm', 'penawaran_krs_id']); // biar tidak dobel ambil matkul yang sama
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krs_mahasiswa');
    }
};
