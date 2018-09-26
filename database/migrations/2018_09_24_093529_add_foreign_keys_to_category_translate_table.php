<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCategoryTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('category_translate', function(Blueprint $table)
		{
			$table->foreign('category_id', 'category_translate_ibfk_1')->references('id')->on('category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('translate_id', 'category_translate_ibfk_2')->references('id')->on('language')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('category_translate', function(Blueprint $table)
		{
			$table->dropForeign('category_translate_ibfk_1');
			$table->dropForeign('category_translate_ibfk_2');
		});
	}

}
