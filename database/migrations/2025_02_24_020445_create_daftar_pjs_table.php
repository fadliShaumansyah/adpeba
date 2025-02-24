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
        Schema::create('daftar_pjs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pj');
            $table->text('alamat_pj');
            $table->string('ketua_pj');
            $table->string('sk_ketua_pj');
            $table->date('periode_awal');
            $table->text('periode_akhir');
            $table->string('kontak_ketua_pj');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_pjs');
    }
};
