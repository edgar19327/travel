<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_translate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->integer('category_id')->index('category_id');
			$table->integer('translate_id')->index('translate_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_translate');
	}

}
