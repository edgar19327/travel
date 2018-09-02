<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('images', function(Blueprint $table)
		{
			$table->foreign('slider_id', 'images_ibfk_4')->references('id')->on('sliderCrud')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('place_id', 'images_ibfk_5')->references('id')->on('place')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'images_ibfk_6')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('images', function(Blueprint $table)
		{
			$table->dropForeign('images_ibfk_4');
			$table->dropForeign('images_ibfk_5');
			$table->dropForeign('images_ibfk_6');
		});
	}

}
