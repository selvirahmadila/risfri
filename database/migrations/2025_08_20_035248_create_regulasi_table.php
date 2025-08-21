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
        Schema::create('regulasi', function (Blueprint $table) {
            $table->id();
            $table->string('regulation_number');
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->date('published_date');
            $table->string('status');
            $table->integer('year');
            $table->string('institution')->nullable();
            $table->string('regulation_file')->nullable();
            $table->string('tags')->nullable();
            $table->text('content')->nullable();
            $table->text('scope')->nullable();
            $table->text('key_provisions')->nullable();
            $table->text('penalties')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulasi');
    }
};
