<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoremasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoremaster', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('first_inn_runs');
            $table->unsignedBigInteger('second_inn_runs');
            $table->unsignedBigInteger('first_inn_overs');
            $table->unsignedBigInteger('second_inn_overs');
            $table->unsignedBigInteger('current_inn');
            $table->timestamps();
            
            $table->foreign('match_id')
            ->references('id')
            ->on('matches')
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
        Schema::dropIfExists('scoremaster');
    }
}
