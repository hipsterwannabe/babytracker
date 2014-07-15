<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBabyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('babies', function($table)
        {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('gender', 100);
            $table->date('birth_date');
            $table->integer('birth_pounds');
            $table->integer('birth_ounces');
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
		Schema::drop('babies');
	}

}
