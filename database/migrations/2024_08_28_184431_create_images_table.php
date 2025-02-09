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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // Stores the image file path
            $table->string('imageable_type'); // The model type (e.g., Category, Product)
            $table->unsignedBigInteger('imageable_id'); // The model ID

            // Indexes for faster lookups
            $table->index(['imageable_type', 'imageable_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
