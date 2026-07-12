<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('competition_submissions', function (Blueprint $table) {

            $table->boolean('is_winner')
                ->default(false)
                ->after('status');

            $table->integer('winner_position')
                ->nullable()
                ->after('is_winner');

        });
    }

    public function down()
    {
        Schema::table('competition_submissions', function (Blueprint $table) {

            $table->dropColumn([
                'is_winner',
                'winner_position',
            ]);

        });
    }
};
