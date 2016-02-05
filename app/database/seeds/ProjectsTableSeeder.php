<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Projects::create([
				'title' => $faker->text(100),
				'address' => $faker->address(),
				'latitude' => $faker->randomFloat(null, 18.005611, 48.987386),
				'longitude' => $faker->randomFloat(null, -124.626080, -62.361014),
				'description' => $faker->text(200),
				'hashtag' => '#' . $faker->unique()->word(),
				'date_started' => $faker->date()
			]);
		}
	}

}