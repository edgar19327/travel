<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAboutTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('about_translate', function(Blueprint $table)
		{
			$table->foreign('about_id', 'about_translate_ibfk_1')->references('id')->on('about')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('language_id', 'about_translate_ibfk_2')->references('id')->on('language')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('about_translate', function(Blueprint $table)
		{
			$table->dropForeign('about_translate_ibfk_1');
			$table->dropForeign('about_translate_ibfk_2');
		});
	}

}
