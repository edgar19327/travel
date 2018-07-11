<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_translate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('surname');
			$table->string('description');
			$table->integer('user_id')->index('user_id');
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
		Schema::drop('user_translate');
	}

}
