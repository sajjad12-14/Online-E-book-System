<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('competition_submissions', function (Blueprint $table) {

            if (! Schema::hasColumn('competition_submissions', 'image')) {

                $table->string('image')
                    ->nullable()
                    ->after('email');

            }

            if (! Schema::hasColumn('competition_submissions', 'is_winner')) {

                $table->integer('is_winner')
                    ->default(0)
                    ->after('status');

            }

            if (! Schema::hasColumn('competition_submissions', 'winner_position')) {

                $table->integer('winner_position')
                    ->nullable()
                    ->after('is_winner');

            }

        });
    }

    public function down(): void
    {

        Schema::table('competition_submissions', function (Blueprint $table) {

            if (Schema::hasColumn('competition_submissions', 'image')) {

                $table->dropColumn('image');

            }

            if (Schema::hasColumn('competition_submissions', 'is_winner')) {

                $table->dropColumn('is_winner');

            }

            if (Schema::hasColumn('competition_submissions', 'winner_position')) {

                $table->dropColumn('winner_position');

            }

        });

    }
};
