<?php namespace Modules\Auth\Entities;
   
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

	protected $table = 'roles';

    protected $fillable = ['name', 'display_name', 'description'];

    public function permissions() {

    	return $this->belongsToMany(Permission::class, 'permission_role');
    }

    public function users() {

        return $this->belongsToMany(User::class, 'role_user');
    }

}