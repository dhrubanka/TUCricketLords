<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team2_id')->nullable();
            $table->unsignedBigInteger('toss')->nullable();
            $table->unsignedBigInteger('start_innings')->nullable();
            $table->unsignedBigInteger('won_team_id')->nullable();
            $table->string('conclusion')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('team1_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
                
                $table->foreign('team2_id')
                ->references('id')
                ->on('teams')
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
        Schema::dropIfExists('matches');
    }
}
