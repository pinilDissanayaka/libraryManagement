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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id() -> primary();
            $table->unsignedBigInteger('member_id');
            $table->string('type')->nullable(); #Renew, Borrowed, Return, Pay
            $table->string('title')->nullable();
            $table->string('ISBN')->nullable();
            $table->float('fine', precision:2)->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
