<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoryPlaceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('category_place', function(Blueprint $table)
		{
			$table->foreign('category_id', 'category_place_ibfk_1')->references('id')->on('category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('place_id', 'category_place_ibfk_2')->references('id')->on('place')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('category_place', function(Blueprint $table)
		{
			$table->dropForeign('category_place_ibfk_1');
			$table->dropForeign('category_place_ibfk_2');
		});
	}

}
