<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

	/**
	 * Populate users table with sample data
	 * @return void
	 */
	public function run()
	{
		// Wipe out the table clean before populating with new sample data
		DB::table('users')->delete();

		$users = array(
			['name' => 'Toan Nguyen', 'email' => 'toannt42@gmail.com', 'password' => bcrypt('123456')],
			['name' => 'John Doe', 'email' => 'john@doe.com', 'password' => bcrypt('123456')],
			['name' => 'Jane Doe', 'email' => 'jane@doe.com', 'password' => bcrypt('123456')]
		);

		foreach ($users as $user) {
			User::create($user);
		}
	}
}
