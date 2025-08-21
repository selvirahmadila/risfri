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
        Schema::create('tabel_spektrum', function (Blueprint $table) {
            $table->id();
            $table->string('frequency_band');
            $table->string('band_category');
            $table->string('service');
            $table->string('status');
            $table->string('bandwidth')->nullable();
            $table->string('regulation')->nullable();
            $table->integer('allocation_year')->nullable();
            $table->string('condition')->nullable();
            $table->text('users')->nullable();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_spektrum');
    }
};
