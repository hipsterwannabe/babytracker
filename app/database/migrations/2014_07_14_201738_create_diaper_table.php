<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaperTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diapers', function($table)
        {
            $table->increments('id');
            $table->integer('baby_id')->unsigned();
            $table->boolean('number_one')->nullable();
            $table->boolean('number_two')->nullable();
            $table->text('consistency')->nullable();
            $table->text('color')->nullable();
            $table->boolean('leak')->nullable();
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
        Schema::drop('diapers');
    }

}
