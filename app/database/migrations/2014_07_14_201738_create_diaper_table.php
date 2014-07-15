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
            $table->increments('baby_id');
            $table->timestamp('change_time');
            $table->boolean('number_one')->nullable();
            $table->boolean('number_two')->nullable();
            $table->integer('consistency')->nullable();
            $table->integer('color')->nullable();
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
