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
		$this->call('DiaperTableSeeder');
		$this->call('FeedingTableSeeder');
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

		$nap = new Nap();
		$nap->baby_id = 2;
		$nap->nap_start = '2014-07-15 14:14:08';
		$nap->nap_end = '2014-07-15 14:14:08';
		$nap->notes = 'Woke up cranky.';
		$nap->save();

		$nap = new Nap();
		$nap->baby_id = 3;
		$nap->nap_start = '2014-07-15 14:14:08';
		$nap->nap_end = '2014-07-15 14:14:08';
		$nap->notes = 'Went to sleep by himself';
		$nap->save();

		$nap = new Nap();
		$nap->baby_id = 4;
		$nap->nap_start = '2014-07-15 14:14:08';
		$nap->nap_end = '2014-07-15 14:14:08';
		$nap->notes = 'Woke up crying';
		$nap->save();

		$nap = new Nap();
		$nap->baby_id = 5;
		$nap->nap_start = '2014-07-15 14:14:08';
		$nap->nap_end = '2014-07-15 14:14:08';
		$nap->notes = 'Had to rock to sleep';
		$nap->save();

		$nap = new Nap();
		$nap->baby_id = 6;
		$nap->nap_start = '2014-07-15 14:14:08';
		$nap->nap_end = '2014-07-15 14:14:08';
		$nap->notes = 'Woke up happy.';
		$nap->save();
	}
}

class DiaperTableSeeder extends seeder {
	public function run() {
		DB::table('diapers')->delete();

		$diaper = new Diaper();
		$diaper->baby_id = 1;
		$diaper->number_one = true;
		$diaper->leak = true;
		$diaper->save();

		$diaper = new Diaper();
		$diaper->baby_id = 2;
		$diaper->number_two = true;
		$diaper->consistency = 1;
		$diaper->color = 1;
		$diaper->notes = 'Breastmilk diaper.';
		$diaper->save();
	}
}

class FeedingTableSeeder extends seeder {
	public function run() {
		DB::table('feedings')->delete();

		$feeding = new Feeding();
		$feeding->breast = true;
		$feeding->baby_id = 1;
		$feeding->start_left = '2014-07-15 14:14:08';
		$feeding->stop_left = '2014-07-15 14:34:08';
		$feeding->save();

		$feeding = new Feeding();
		$feeding->bottle = true;
		$feeding->baby_id = 2;
		$feeding->start_bottle = '2014-07-15 14:14:08';
		$feeding->stop_bottle = '2014-07-15 14:34:08';
		$feeding->bottle_ounces = 5;
		$feeding->save();

	}
}
