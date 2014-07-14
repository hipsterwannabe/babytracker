<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToDiaper extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('diaper', function(Blueprint $table)
		{
			$table->foreign('baby_id')->references('id')->on('baby');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('diaper', function(Blueprint $table)
		{
			$table->dropForeign('diaper_baby_id_foreign');
		});
	}

}
