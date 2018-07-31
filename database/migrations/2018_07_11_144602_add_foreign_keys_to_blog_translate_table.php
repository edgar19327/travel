<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBlogTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('blog_translate', function(Blueprint $table)
		{
			$table->foreign('lenguage_id', 'blog_translate_ibfk_1')->references('id')->on('languageCrud')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('blog_id', 'blog_translate_ibfk_2')->references('id')->on('blog')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('blog_translate', function(Blueprint $table)
		{
			$table->dropForeign('blog_translate_ibfk_1');
			$table->dropForeign('blog_translate_ibfk_2');
		});
	}

}
