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
        Schema::create('books', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('title');
            $table->string('author');
            $table->string('ISBN');
            $table->string('genre');
            $table->string('publicationYear');
            $table->string('description');
            $table->string('shelfLocation');
            $table->string('status')->default('Available'); #borrowed, available, reserved
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
