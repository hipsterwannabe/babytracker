<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBabyStatsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baby_stats', function($table)
        {
            $table->increments('id');
            $table->integer('baby_id')->unsigned();
            $table->integer('pounds')->nullable;
            $table->integer('ounces')->nullable;
            $table->float('length')->nullable;
            $table->float('head')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('baby_stats');
    }

}
