<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_rating', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('user_rating_ibfk_1');
			$table->integer('rating_user_id')->index('rating_user_id');
			$table->integer('rating');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_rating');
	}

}
