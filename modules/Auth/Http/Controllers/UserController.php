<?php namespace Modules\Auth\Http\Controllers;

use Modules\Auth\Entities\Role;
use Modules\Auth\Entities\User;
use Modules\Auth\Http\Requests\UserRequest;
use Modules\Auth\Traits\UserHelper;
use Pingpong\Modules\Routing\Controller;

class UserController extends Controller {

    use UserHelper;

	public function __construct() {

		$this->middleware('auth');
	}

    public function index() {

        if(auth()->user()->can('read-users')) {

            $users = User::with('roles')->get();

            return view('auth::user.index', compact('users'));
        }

        return redirect('auth/logout');
    }

    public function create() {

        if(auth()->user()->can('create-users')) {

            $roles = Role::orderBy('display_name', 'asc')->lists('display_name', 'id');

            return view('auth::user.create', compact('roles'));
        }

        return redirect('auth/logout');
    }

    public function store(UserRequest $request) {

        if(auth()->user()->can('create-users')) {

            $user = $this->saveUser($request);

            return redirect()->back()
                             ->with('message', trans('auth::ui.user.message_create', array('name' => $user->fullname)));
        }

        return redirect('auth/logout');
    }

    public function edit($id) {

        if(auth()->user()->can('update-users')) {

            $user = User::findOrFail($id);

            $roles_user = $user->find($id)->roles()->lists('role_id')->toArray();

            $roles = Role::orderBy('display_name', 'asc')->lists('display_name', 'id');

            return view('auth::user.edit', compact('user', 'roles', 'roles_user'));
        }

        return redirect('auth/logout');
    }

    public function update($id, UserRequest $request){

        if(auth()->user()->can('update-users')) {

            $user = User::findOrFail($id);

            $this->updateUser($user, $request);

            return redirect('auth/user')->with('message', trans('auth::ui.user.message_update', array('name' => $user->fullname)));
        }

        return redirect('auth/logout');
    }

    public function destroy($id) {

        if(auth()->user()->can('delete-users')) {

            $user = User::findOrFail($id);

            $user->delete();

            return redirect()->back()
                             ->with('message', trans('auth::ui.user.message_delete', array('name' => $user->fullname)));
        }

        return redirect('auth/logout');
    }

}