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
    Schema::create('info_frekuensis', function (Blueprint $table) {
        $table->id();
        $table->string('cover')->nullable();
        $table->string('judul');
        $table->text('deskripsi');
        $table->string('gambar')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_frekuensis');
    }
};
