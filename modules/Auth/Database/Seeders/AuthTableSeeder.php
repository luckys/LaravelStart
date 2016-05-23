<?php namespace Modules\Auth\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Modules\Auth\Traits\SeedPermissions;

class AuthTableSeeder extends Seeder {

    use SeedPermissions;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->runSeeder();
	}

    /**
     * Agrega un permiso a la BD
     *
     * @return void
     */
    private function seedPermission($action, $model)
    {
        DB::table('permissions')->insert([
            'name' => $this->formatToSlug($action, $model),
            'display_name' => $this->formatToCamelCase($action, $model),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Agrega un usuario a la BD
     *
     * @return void
     */
	private function seedUser(){

		DB::table('users')->insert(array(
            'firstname' => 'Jose',
            'lastname' => 'Perez Lopez',
            'username' => 'admin',
            'email' => 'admin@demo.com',
            'password' => bcrypt('admin123'),
            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ));

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
    }

    /**
     * Agrega el role de administrador a la BD
     *
     * @return void
     */
    private function seedRole()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        for($i=1; $i <= 12; $i++){
            DB::table('permission_role')->insert([
                'permission_id' => $i,
                'role_id' => 1,
            ]);
        }
    }

    /**
     * Realiza el seed de los datos desde el fichero
     *
     * @return void
     */
    private function runSeeder()
    {
        $array_permissions = Config::get('auth.tables');
        
        foreach ($array_permissions as $table => $action) {
            foreach ($action as $value) {
                $this->seedPermission($value, $table);
            }
        }
        
        $this->seedRole();
        $this->seedUser();
    }

}