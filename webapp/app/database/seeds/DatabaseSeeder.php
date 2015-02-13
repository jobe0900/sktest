<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

	public function run()
	{
		// make a fresh start
		DB::table('users')->delete();

		User::create(
			array (
				'email' => 'test@email.com',
				'username' => 'Test Person',
				'password' => Hash::make('secret_pass')
			)
		);
	}
}
