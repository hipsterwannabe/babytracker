<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEatingTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedings', function($table)
        {
            $table->increments('id');
            $table->integer('baby_id')->unsigned();
            $table->boolean('breast');
            $table->timestamp('start_left')->nullable();
            $table->timestamp('stop_left')->nullable();
            $table->timestamp('start_right')->nullable();
            $table->timestamp('stop_right')->nullable();
            $table->boolean('bottle');
            $table->timestamp('start_bottle')->nullable();
            $table->timestamp('stop_bottle')->nullable();
            $table->integer('bottle_ounces')->nullable();
            $table->text('notes')->nullable();
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
        Schema::drop('feedings');
    }

}
