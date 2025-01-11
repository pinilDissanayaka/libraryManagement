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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id')->nullable();
            $table->unsignedBigInteger('newspaper_id')->nullable();
            $table->unsignedBigInteger('magazine_id')->nullable();
            $table->unsignedBigInteger('member_id');
            $table->date('transaction_date');
            $table->date('due_date');
            $table->date('return_date')->nullable();
            $table->timestamps();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('newspaper_id')->references('id')->on('news_papers')->onDelete('cascade');
            $table->foreign('magazine_id')->references('id')->on('magazines')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }

};
