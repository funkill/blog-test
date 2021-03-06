<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_role', function(Blueprint $table)
		{
			$table
				->integer('role_id')
				->unsigned()
			;

			$table
				->foreign('role_id')
				->references('id')
				->on('roles')
				->onDelete('cascade')
			;

			$table
				->integer('user_id')
				->unsigned()
			;

			$table
				->foreign('user_id')
				->references('id')
				->on('users')
				->onDelete('cascade')
			;
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_role');
	}

}
