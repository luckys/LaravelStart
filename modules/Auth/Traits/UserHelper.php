<?php

namespace Modules\Auth\Traits;

use Illuminate\Support\Facades\Mail;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\UserRequest;

trait UserHelper
{
    public function decorateWithSpan($value, $state)
    {
        return '<span class="label label-'.$state.'">'.$value.'</span>';
    }

    public function saveUser(UserRequest $request)
    {
        $user = User::create([
            'firstname' =>  $request->input('firstname'),
            'lastname'  =>  $request->input('lastname'),
            'username'  =>  str_random(10),
            'email'     =>  $request->input('email'),
            'password'  =>  bcrypt('demo'),
            'avatar'    =>  'avatar-mini.jpg',
            'activated' =>  false,
            'email_token' =>  str_random(20),
        ]);

        $user->attachRoles($request->input('role_id'));
        
        return $user;
        
    }

    public function updateUser(User $user, UserRequest $request)
    {
        $data = [
            'firstname' =>  $request->input('firstname'),
            'lastname'  =>  $request->input('lastname'),
            'email'  =>  $request->input('email'),
            'activated'  =>  $request->input('activated') ? 1 : 0,
            'role_id'  =>  $request->input('role_id'),
        ];
        
        $user->update($data);

        if($user->roles->count()) {

            $user->roles()->detach($user->roles()->lists('role_id')->toArray());
        }

        $user->attachRoles($request->input('role_id'));
    }

    public function sendEmail(User $user)
    {
        Mail::send('auth::emails.active-account', ['user' => $user], function ($m) use ($user) {
            $m->from('webmaster@laravelstart.app', 'LaravelStart');

            $m->to($user->email, $user->firstname)
                ->subject('Activacion de la cuenta');
        });
    }

}