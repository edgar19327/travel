<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('path');
			$table->enum('position', array('main','image'));
			$table->integer('slider_id')->nullable()->index('slider_id');
			$table->integer('place_id')->nullable()->index('place_id');
			$table->integer('user_id')->nullable()->index('user_id');
			$table->enum('status', array('0','1'))->default('1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
