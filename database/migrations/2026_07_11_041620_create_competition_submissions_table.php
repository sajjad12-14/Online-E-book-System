<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('competition_submissions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('competition_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->string('email');

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('file')->nullable();

            $table->integer('status')->default(0);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competition_submissions');
    }
};
