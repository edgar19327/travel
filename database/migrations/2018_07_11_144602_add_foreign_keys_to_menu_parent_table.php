<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMenuParentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('menu_parent', function(Blueprint $table)
		{
			$table->foreign('parent_id', 'menu_parent_ibfk_1')->references('id')->on('menu')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('menu_parent', function(Blueprint $table)
		{
			$table->dropForeign('menu_parent_ibfk_1');
		});
	}

}
