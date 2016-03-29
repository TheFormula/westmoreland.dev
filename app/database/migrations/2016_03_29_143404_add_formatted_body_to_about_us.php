<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFormattedBodyToAboutUs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('about_us', function(Blueprint $table)
		{
			$table->text('formatted_body');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('about_us', function(Blueprint $table)
		{
			$table->dropColumn('formatted_body');
		});
	}

}
