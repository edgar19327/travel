<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_translate', function(Blueprint $table)
		{
			$table->foreign('user_id', 'user_translate_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('language_id', 'user_translate_ibfk_2')->references('id')->on('languageCrud')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_translate', function(Blueprint $table)
		{
			$table->dropForeign('user_translate_ibfk_1');
			$table->dropForeign('user_translate_ibfk_2');
		});
	}

}
