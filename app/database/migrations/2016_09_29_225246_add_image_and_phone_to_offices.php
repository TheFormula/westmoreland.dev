<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageAndPhoneToOffices extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('offices', function(Blueprint $table)
		{
			$table->string('image');
			$table->string('phone_number');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('offices', function(Blueprint $table)
		{
			$table->dropColumn('image');
			$table->dropColumn('phone_number');
		});
	}

}
