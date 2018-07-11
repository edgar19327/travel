<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRatingPlaceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rating_place', function(Blueprint $table)
		{
			$table->foreign('users_id', 'rating_place_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('place_id', 'rating_place_ibfk_2')->references('id')->on('place')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rating_place', function(Blueprint $table)
		{
			$table->dropForeign('rating_place_ibfk_1');
			$table->dropForeign('rating_place_ibfk_2');
		});
	}

}
