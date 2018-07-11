<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStateTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('state_translate', function(Blueprint $table)
		{
			$table->foreign('state_id', 'state_translate_ibfk_1')->references('id')->on('state')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('language_id', 'state_translate_ibfk_2')->references('id')->on('language')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('state_translate', function(Blueprint $table)
		{
			$table->dropForeign('state_translate_ibfk_1');
			$table->dropForeign('state_translate_ibfk_2');
		});
	}

}
