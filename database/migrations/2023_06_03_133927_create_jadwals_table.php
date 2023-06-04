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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('kd_lab');
            $table->string('nama_dosen');
            $table->string('kd_matkul');
            $table->string('kd_kelas');
            $table->time('waktu');
            $table->date('tanggal');
            $table->enum('status', ['Diterima', 'Pending', 'Ditolak'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
