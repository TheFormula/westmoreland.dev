<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create(['first_name' => $_ENV['USER1_FIRST'], 'last_name' => $_ENV['USER1_LAST'], 'email' => $_ENV['USER1_EMAIL'], 'password' => Hash::make($_ENV['USER1_PASS'])]);
		User::create(['first_name' => $_ENV['USER2_FIRST'], 'last_name' => $_ENV['USER2_LAST'], 'email' => $_ENV['USER2_EMAIL'], 'password' => Hash::make($_ENV['USER2_PASS'])]);
	}

}