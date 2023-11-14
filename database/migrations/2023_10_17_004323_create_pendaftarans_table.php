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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->string('no_pendaftaran')->unique();
            $table->enum('jalur', ['Beasiswa Akademik', 'Beasiswa Ekstrakulikuler', 'Umum']);
            $table->enum('status', ['Proses', 'Lulus', 'Tidak Lulus', 'Belum Bayar']);

            $table->timestamps();

            $table->foreign('siswa_id')->on('siswas')->references('id');
            $table->foreign('admin_id')->on('admins')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
