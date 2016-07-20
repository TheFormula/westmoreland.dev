<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		DB::unprepared(file_get_contents('app/database/seeds/west_db.sql'));
	}

}