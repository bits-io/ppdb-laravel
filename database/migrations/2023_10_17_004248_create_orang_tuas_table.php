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
        Schema::create('orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('nama')->nullable();
            $table->string('pekerjaan');
            $table->integer('penghasilan');
            $table->string('no_hp_orangtua');
            $table->timestamps();

            $table->foreign('siswa_id')->on('siswas')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tuas');
    }
};
