<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToLengths extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lengths', function(Blueprint $table)
		{
			$table->foreign('baby_id')->references('id')->on('babies');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lengths', function(Blueprint $table)
		{
			$table->dropForeign('lengths_baby_id_foreign');
		});
	}

}
