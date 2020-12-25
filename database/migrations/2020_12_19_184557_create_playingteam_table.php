<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayingteamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playingteam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('role');
            $table->timestamps();

            $table->foreign('match_id')
            ->references('id')
            ->on('matches')
            ->onDelete('cascade');

            $table->foreign('player_id')
            ->references('id')
            ->on('players')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playingteam');
    }
}
