<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogTranslateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog_translate', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('title');
			$table->string('description');
			$table->integer('lenguage_id')->index('lenguage_id');
			$table->integer('blog_id')->index('blog_translate_ibfk_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blog_translate');
	}

}
