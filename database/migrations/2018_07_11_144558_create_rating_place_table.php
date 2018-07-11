<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingPlaceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rating_place', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('rating');
			$table->integer('users_id')->index('users_id');
			$table->integer('place_id')->index('rating_place_ibfk_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rating_place');
	}

}
