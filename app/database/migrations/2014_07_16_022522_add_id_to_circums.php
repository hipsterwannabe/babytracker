<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToCircums extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('circums', function(Blueprint $table)
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
		Schema::table('circums', function(Blueprint $table)
		{
			$table->dropForeign('circums_baby_id_foreign');
		});
	}

}
