<?php namespace Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Pingpong\Modules\Routing\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/dashboard';

    protected $loginPath = '/';

    public function index() {

        return view('auth::login');
    }


    protected function getFailedLoginMessage() {

        return trans('auth::ui.login.credentials_error', array('field' => Config::get('auth.login')));
    }
	
}