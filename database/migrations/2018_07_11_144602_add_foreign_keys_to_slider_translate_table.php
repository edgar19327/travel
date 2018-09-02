<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSliderTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('slider_translate', function(Blueprint $table)
		{
			$table->foreign('slider_id', 'slider_translate_ibfk_1')->references('id')->on('sliderCrud')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('lenguage_id', 'slider_translate_ibfk_2')->references('id')->on('languageCrud')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('slider_translate', function(Blueprint $table)
		{
			$table->dropForeign('slider_translate_ibfk_1');
			$table->dropForeign('slider_translate_ibfk_2');
		});
	}

}
