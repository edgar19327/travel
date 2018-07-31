<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPlaceTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('place_translate', function(Blueprint $table)
		{
			$table->foreign('place_id', 'place_translate_ibfk_1')->references('id')->on('place')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('language_id', 'place_translate_ibfk_2')->references('id')->on('languageCrud')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('place_translate', function(Blueprint $table)
		{
			$table->dropForeign('place_translate_ibfk_1');
			$table->dropForeign('place_translate_ibfk_2');
		});
	}

}
