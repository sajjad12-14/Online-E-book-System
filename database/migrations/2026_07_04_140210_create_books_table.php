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

            $table->id();

            // Relations
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('author_id')->constrained()->cascadeOnDelete();

            // Book Details
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');

            // Files
            $table->string('image');
            $table->string('pdf');

            // Price
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('discount_price', 10, 2)->nullable();

            // Stock
            $table->integer('stock')->default(0);

            // Home Page Sections
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_best_selling')->default(false);
            $table->boolean('is_featured')->default(false);

            // Status
            $table->boolean('status')->default(true);

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