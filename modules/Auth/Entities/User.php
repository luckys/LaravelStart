<?php

namespace Modules\Auth\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Modules\Auth\Traits\UserHelper;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use EntrustUserTrait, UserHelper;

    
    protected $table = 'users';

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'avatar',
        'activated',
        'email_token'];

    protected $hidden = ['password', 'remember_token'];
    

    public function roles() {

        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function getFullnameAttribute() {
        
        return $this->firstname.' '.$this->lastname;
    }

    public function getAccountAttribute() {

        return $this->activated ?
            $this->decorateWithSpan(trans('auth::ui.user.account_activated'), 'success') :
            $this->decorateWithSpan(trans('auth::ui.user.account_unactivated'), 'danger');
    }
}
