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
        Schema::table('feedings', function(Blueprint $table)
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
        Schema::table('feedings', function(Blueprint $table)
        {
            $table->dropForeign('feedings_baby_id_foreign');
        });
    }

}
