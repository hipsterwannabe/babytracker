<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToSleep extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sleep', function(Blueprint $table)
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
		Schema::table('sleep', function(Blueprint $table)
		{
			$table->dropForeign('sleep_baby_id_foreign');
		});
	}

}
