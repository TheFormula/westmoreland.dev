<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('project_name');
			$table->string('customer_name');
			$table->string('address')->nullable();
			$table->double('latitude', 15, 12)->nullable();
			$table->double('longitude', 15, 12)->nullable();
			$table->text('description');
			$table->string('hashtag')->unique()->nullable();
			$table->date('date_started');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
