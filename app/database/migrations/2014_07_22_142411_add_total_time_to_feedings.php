<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalTimeToFeedings extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedings', function(Blueprint $table)
        {
            $table->time('nursing_time');
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
            $table->drop('nursing_time');
        });
    }

}
