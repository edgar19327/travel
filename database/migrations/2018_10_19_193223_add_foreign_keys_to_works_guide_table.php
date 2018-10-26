<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWorksGuideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('works_guide', function(Blueprint $table)
		{
			$table->foreign('state_id', 'works_guide_ibfk_1')->references('id')->on('state')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'works_guide_ibfk_2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('works_guide', function(Blueprint $table)
		{
			$table->dropForeign('works_guide_ibfk_1');
			$table->dropForeign('works_guide_ibfk_2');
		});
	}

}
