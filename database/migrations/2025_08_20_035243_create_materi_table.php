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
        Schema::create('materi', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->text('content');
            $table->string('level');
            $table->integer('duration');
            $table->string('status')->default('published');
            $table->string('category')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('tags')->nullable();
            $table->string('author')->nullable();
            $table->text('learning_objectives')->nullable();
            $table->text('prerequisites')->nullable();
            $table->text('references')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
