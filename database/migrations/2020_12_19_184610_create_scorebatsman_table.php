<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScorebatsmanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scorebatsman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scoreboard_master_id');
            $table->unsignedBigInteger('playing_eleven_id');
            $table->unsignedBigInteger('runs');
            $table->unsignedBigInteger('balls_faced');
            $table->unsignedBigInteger('status');
            $table->timestamps();

            $table->foreign('scoreboard_master_id')
            ->references('id')
            ->on('scoremaster')
            ->onDelete('cascade');

            $table->foreign('playing_eleven_id')
            ->references('id')
            ->on('playingteam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scorebatsman');
    }
}
