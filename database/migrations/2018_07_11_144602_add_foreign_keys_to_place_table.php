<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPlaceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('place', function(Blueprint $table)
		{
			$table->foreign('state_id', 'place_ibfk_1')->references('id')->on('state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('place', function(Blueprint $table)
		{
			$table->dropForeign('place_ibfk_1');
		});
	}

}
