<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 100) as $index)
		{
			Project::create([
				'customer_id' => Customer::orderByRaw('RAND()')->first()->id,
				'project_name' => $faker->text(100),
				'address' => $faker->address(),
				'latitude' => $faker->randomFloat(null, 18.005611, 48.987386),
				'longitude' => $faker->randomFloat(null, -124.626080, -62.361014),
				'description' => $faker->text(200),
				'hashtag' => '#' . $faker->unique()->word(),
				'category_id' => Category::orderByRaw('RAND()')->first()->id,
				'date_started' => $faker->date(),
				'image' => 'http://placehold.it/225x150'
			]);
		}
	}

}