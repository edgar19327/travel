<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateButtoneTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buttone_translate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->integer('button_id')->index('button_id');
			$table->integer('language_id')->index('language_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buttone_translate');
	}

}
