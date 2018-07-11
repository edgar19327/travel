<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLanguageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('language', function(Blueprint $table)
		{
			$table->foreign('image_id', 'language_ibfk_1')->references('id')->on('images')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('language', function(Blueprint $table)
		{
			$table->dropForeign('language_ibfk_1');
		});
	}

}
