<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalleventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ballevent', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('score_master_id');
            $table->unsignedBigInteger('batsman_id');
            $table->unsignedBigInteger('bowler_id');
            
            $table->integer('wicket')->default(0);// 0 not out, 1 bowled,2 lbw, 3 caught, 4 run out
            $table->unsignedBigInteger('supported_by_id')->default(0); //0 default for none

            $table->integer('dot')->default(0); // 0 for none, 1 for dot
            $table->integer('extra')->default(0);// 0 fo none, 1 for wide, 2 no ball, 3 dead ball
            
            $table->integer('run_scored')->default(0);
            $table->integer('run_byes')->default(0);

            $table->timestamps();

            $table->foreign('score_master_id')
            ->references('id')
            ->on('scoremaster')->onDelete('cascade');

            $table->foreign('batsman_id')
                ->references('id')
                ->on('scorebatsman');
                
                $table->foreign('bowler_id')
                ->references('id')
                ->on('scorebowler');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ballevent');
    }
}
