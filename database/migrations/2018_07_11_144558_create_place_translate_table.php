<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlaceTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('place_translate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->string('description');
			$table->integer('place_id')->nullable()->index('place_translate_ibfk_1');
			$table->integer('language_id')->nullable()->index('language_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('place_translate');
	}

}
