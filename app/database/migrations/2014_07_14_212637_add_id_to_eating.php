<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToEating extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('eating', function(Blueprint $table)
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
		Schema::table('eating', function(Blueprint $table)
		{
			$table->dropForeign('eating_baby_id_foreign');
		});
	}

}
