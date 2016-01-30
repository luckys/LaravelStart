<?php namespace Modules\Auth\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('roles')->insert(array(
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administra los módulos de usuarios',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

		for($i=1; $i < 13; $i++){
            DB::table('permission_role')->insert(array(
                'permission_id' => $i,
                'role_id' => 1
            ));
        }
	}

}