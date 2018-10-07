<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToButtoneTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('buttone_translate', function(Blueprint $table)
		{
			$table->foreign('button_id', 'buttone_translate_ibfk_1')->references('id')->on('button')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('language_id', 'buttone_translate_ibfk_2')->references('id')->on('language')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('buttone_translate', function(Blueprint $table)
		{
			$table->dropForeign('buttone_translate_ibfk_1');
			$table->dropForeign('buttone_translate_ibfk_2');
		});
	}

}
