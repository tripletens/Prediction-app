<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldsToGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->time('match_time')->nullable(); // time for the match 
            $table->string('team_a')->nullable(); // name of team a
            $table->string('team_b')->nullable();   // name of team b
            $table->integer('percent')->nullable(); // analyst % confidence in prediction
            $table->integer('result_a')->nullable();// final score for the team a
            $table->integer('result_b')->nullable(); // final score for the team b 
            $table->date('match_date')->nullable(); // match date 
            // for odds +2.5 means over 2.5 
            // while -2.5 means under 2.5 goals
            $table->float('game_type')->nullable(); // 2.5 || 1.5  either + or -
            $table->string('game_status')->nullable(); // either free, paid , or any other category 
            $table->float('team_a_odd')->nullable();  // match odd for team a
            $table->float('team_b_odd')->nullable(); // match odd for team b 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('match_time')->nullable();
            $table->dropColumn('team_a')->nullable();
            $table->dropColumn('team_b')->nullable();
            $table->dropColumn('percent')->nullable();
            $table->dropColumn('result_a')->nullable();
            $table->dropColumn('result_b')->nullable();
            $table->dropColumn('match_date')->nullable();
            // for odds +2.5 means over 2.5 
            // while -2.5 means under 2.5 goals
            $table->dropColumn('game_type')->nullable();
            $table->dropColumn('game_status')->nullable(); // either free, paid , or any other category 
            $table->dropColumn('team_a_odd')->nullable();
            $table->dropColumn('team_b_odd')->nullable();
        });
    }
}
