<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('languageCrud', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('code');
			$table->string('translation');
			$table->integer('image_id')->nullable()->index('language_ibfk_1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('languageCrud');
	}

}
