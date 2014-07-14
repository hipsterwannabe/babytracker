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
		Schema::create('eating', function($table)
        {
            $table->increments('baby_id');
           	$table->boolean('breast');
           	$table->boolean('breast_left');
           	$table->timestamp('start_left')->nullable();
           	$table->timestamp('stop_left')->nullable();
           	$table->boolean('breast_right');
           	$table->timestamp('start_right')->nullable();
           	$table->timestamp('stop_right')->nullable();
           	$table->boolean('bottle');
           	$table->timestamp('start_bottle')->nullable();
           	$table->timestamp('stop_bottle')->nullable();
           	$table->decimal('bottle_ounces', 4,2)->nullable();
            $table->text('notes')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	
		Schema::drop('eating');

	}

}
