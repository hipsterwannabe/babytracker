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
		DB::table('baby')->delete();

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

class SleepTableSeeder extends Seeder {
	public function run() {
		DB::table('sleep')->delete();

		$sleep = new Sleep();
		$sleep->baby_id = 1;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'This was a really good nap.';

		$sleep = new Sleep();
		$sleep->baby_id = 1;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'He was fussy during this nap.';

		$sleep = new Sleep();
		$sleep->baby_id = 2;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Went down easily by herself.';

		$sleep = new Sleep();
		$sleep->baby_id = 2;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Had to rock her for 10 minutes.';

		$sleep = new Sleep();
		$sleep->baby_id = 3;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = "Didn't want to nap.";

		$sleep = new Sleep();
		$sleep->baby_id = 3;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Slept Soundly.';

		$sleep = new Sleep();
		$sleep->baby_id = 4;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Slept all night.';

		$sleep = new Sleep();
		$sleep->baby_id = 4;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Woke up cranky.';

		$sleep = new Sleep();
		$sleep->baby_id = 5;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Blow out while sleeping.';

		$sleep = new Sleep();
		$sleep->baby_id = 5;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Slept without pacifier.';

		$sleep = new Sleep();
		$sleep->baby_id = 6;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Shorter nap than normal.';

		$sleep = new Sleep();
		$sleep->baby_id = 6;
		$sleep->sleep_start =
		$sleep->sleep_end =
		$sleep->notes = 'Slept well.';
	}
}
