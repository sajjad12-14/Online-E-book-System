<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {

            if (! Schema::hasColumn('books', 'discount_price')) {
                $table->decimal('discount_price', 10, 2)
                    ->nullable()
                    ->after('price');
            }

            if (! Schema::hasColumn('books', 'stock')) {
                $table->integer('stock')
                    ->default(0)
                    ->after('discount_price');
            }

        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {

            if (Schema::hasColumn('books', 'discount_price')) {
                $table->dropColumn('discount_price');
            }

            if (Schema::hasColumn('books', 'stock')) {
                $table->dropColumn('stock');
            }

        });
    }
};
