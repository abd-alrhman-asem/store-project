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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID (primary key)
            $table->string('name'); // Product name
            $table->text('description')->nullable(); // Product description, nullable in case it's optional
            $table->decimal('price', 8, 2); // Price, with 8 digits total and 2 decimal places
            $table->integer('quantity'); // Quantity available
            $table->decimal('weight', 8, 2)->nullable(); // Weight, with 8 digits total and 2 decimal places, nullable in case it's optional
            $table->enum('status', ['active', 'inactive'])->default('active'); // Status field with 'active' or 'inactive' options
            $table->foreignId('category_id')->nullable()->references('id')->on('categories');
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
