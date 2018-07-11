<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSliderTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('slider_translate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->string('description');
			$table->integer('slider_id')->index('slider_translate_ibfk_1');
			$table->integer('lenguage_id')->index('lenguage_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('slider_translate');
	}

}
