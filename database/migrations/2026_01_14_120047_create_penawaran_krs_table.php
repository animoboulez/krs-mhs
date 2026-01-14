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
        Schema::create('penawaran_krs', function (Blueprint $table) {
            $table->id();
            $table->string('hari', 20);
            $table->string('jam', 20); // contoh: "08:00-10:00"
            $table->string('ruang_kelas', 50);
            $table->string('kode_mk', 10);
            $table->string('nama_mk', 100);
            $table->unsignedTinyInteger('sks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penawaran_krs');
    }
};
