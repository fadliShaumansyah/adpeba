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
        Schema::create('iuran_anggota', function (Blueprint $table) {
            $table->uuid('id_iuran')->primary();
            $table->uuid('npa');
            $table->uuid('id_pj');
            $table->decimal('jumlah,10,2')->default(20000);
            $table->year('tahun');
            $table->tinyInteger('bulan');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            //mencegah pembayaran double
            $table->unique(['npa', 'id_pj', 'tahun', 'bulan']);

            //foreign Keu
            $table->foreign('npa')->references('npa')->on('users')->cascadeOnDelete();
            $table->foreign('id_pj')->references('id_pj')->on('daftar_pjs')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iuran_anggota');
    }
};
