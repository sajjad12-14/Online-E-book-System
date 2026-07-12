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
        Schema::create('competitions', function (Blueprint $table) {

            $table->id();

            // Competition Information
            $table->string('title');
            $table->string('slug')->unique();

            // Image
            $table->string('image')->nullable();

            // Details
            $table->longText('description');
            $table->longText('rules')->nullable();

            // Prize
            $table->string('prize')->nullable();

            // Dates
            $table->date('start_date');
            $table->date('end_date');

            // Status
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions');
    }
};
