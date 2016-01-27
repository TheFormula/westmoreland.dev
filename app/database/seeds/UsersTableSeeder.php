<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create(['first_name' => $_ENV['USER_FIRST'], 'last_name' => $_ENV['USER_LAST'], 'email' => $_ENV['USER_EMAIL'], 'password' => Hash::make($_ENV['USER_PASS'])]);
	}

}