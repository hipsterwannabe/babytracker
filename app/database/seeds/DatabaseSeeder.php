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
		$this->call('BabyTableSeeder');
		$this->call('NapTableSeeder');
	}

}

class UserTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->delete();

        $user = new User();
        $user->name = 'Malinda';
        $user->email = 'malindareno@gmail.com';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->name = 'Ashley';
        $user->email = 'ashleyleonawebb@gmail.com';
        $user->password = Hash::make('secret');
        $user->save();

        $user = new User();
        $user->name = 'Tracy';
        $user->email = 'tracyrider@gmail.com';
        $user->password = Hash::make('ssssshhhh');
        $user->save();


    }
}

class BabyTableSeeder extends Seeder {
	public function run() {
		DB::table('babies')->delete();

		$baby = new Baby();
		$baby->name = 'Chad';
		$baby->user_id = 1;
		$baby->save();

		$baby = new Baby();
		$baby->name = 'Haley';
		$baby->user_id = 1;
		$baby->save();

		$baby = new Baby();
		$baby->name = 'Jasper';
		$baby->user_id = 2;
		$baby->save();

		$baby = new Baby();
		$baby->name = 'Payton';
		$baby->user_id = 3;
		$baby->save();

		$baby = new Baby();
		$baby->name = 'Kade';
		$baby->user_id = 3;
		$baby->save();

		$baby = new Baby();
		$baby->name = 'Carmyn';
		$baby->user_id = 3;
		$baby->save();
	}
}

class NapTableSeeder extends Seeder {
	public function run() {
		DB::table('naps')->delete();

		$nap = new Nap();
		$nap->baby_id = 1;
		$nap->nap_start = '2014-07-15 14:14:08';
		$nap->nap_end = '2014-07-15 14:14:08';
		$nap->notes = 'This was a really good nap.';
		$nap->save();
	}
}
