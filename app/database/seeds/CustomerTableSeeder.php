<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CustomerTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Customer::create([
				'name' => $faker->unique()->word(),
				'image' => 'http://placehold.it/225x150',
				'home_page' => 1
			]);
		}
	}

}