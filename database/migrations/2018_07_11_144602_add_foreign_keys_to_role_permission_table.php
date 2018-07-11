<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRolePermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('role_permission', function(Blueprint $table)
		{
			$table->foreign('role_id', 'role_permission_ibfk_1')->references('id')->on('role')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('permission_id', 'role_permission_ibfk_2')->references('id')->on('permission')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('role_permission', function(Blueprint $table)
		{
			$table->dropForeign('role_permission_ibfk_1');
			$table->dropForeign('role_permission_ibfk_2');
		});
	}

}
