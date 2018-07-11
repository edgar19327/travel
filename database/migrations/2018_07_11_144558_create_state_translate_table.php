<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state_translate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->integer('state_id')->nullable()->index('state_translate_ibfk_1');
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
		Schema::drop('state_translate');
	}

}
