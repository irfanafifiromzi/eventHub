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
        Schema::create('addtofavorite', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('email');
            $table->timestamps();
            // Add other columns as needed

            // Define foreign keys
            $table->unique(['id', 'email']);
            $table->foreign('id')->references('id')->on('events');
            $table->foreign('email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addtofavorite');
    }
};
