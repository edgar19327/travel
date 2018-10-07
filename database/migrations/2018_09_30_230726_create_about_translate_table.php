<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAboutTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('about_translate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->text('description', 65535);
			$table->integer('about_id')->index('about_id');
			$table->integer('language_id')->index('language_id');
			$table->enum('type', array('about','guide'))->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('about_translate');
	}

}
