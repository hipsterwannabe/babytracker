<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLengthBottleToFeedingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedings', function(Blueprint $table)
        {
            $table->time('bottle_length');
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
            $table->dropColumn('bottle_length');
        });
    }

}
