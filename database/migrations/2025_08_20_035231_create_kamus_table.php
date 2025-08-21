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
        Schema::create('kamus', function (Blueprint $table) {
            $table->id();
            $table->string('term');
            $table->text('definition');
            $table->string('category');
            $table->string('status')->default('active');
            $table->string('synonyms')->nullable();
            $table->string('icon')->nullable();
            $table->string('unit')->nullable();
            $table->string('reference')->nullable();
            $table->text('description')->nullable();
            $table->text('examples')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamus');
    }
};
