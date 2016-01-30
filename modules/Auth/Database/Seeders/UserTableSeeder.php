<?php namespace Modules\Auth\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert(array(
            'firstname' => 'Jose',
            'lastname' => 'Perez Lopez',
            'username' => 'admin',
            'email' => 'admin@demo.com',
            'password' => \Hash::make('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

		DB::table('role_user')->insert(array(
                'user_id' => 1,
                'role_id' => 1
            ));
	}

}