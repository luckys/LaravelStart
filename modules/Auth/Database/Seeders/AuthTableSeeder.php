<?php namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AuthTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

    Model::unguard();

    $this->call(PermissionTableSeeder::class);
    $this->call(RoleTableSeeder::class);
    $this->call(UserTableSeeder::class);

    Model::reguard();

  } 
}