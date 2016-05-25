<?php namespace Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Modules\Auth\Entities\User;
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

    /**
     * Handle a login request to the application.
     *
     * @param  Request  $request
     * @return Response
     */
    public function postLogin(Request $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'activated' => 1]))
        {
            return redirect($this->redirectPath);
        }

        return redirect($this->loginPath)->withErrors([
            'email' => $this->getFailedLoginMessage(),
        ]);
    }


    protected function getFailedLoginMessage() {

        return trans('auth::ui.login.credentials_error', array('field' => Config::get('auth.login')));
    }

    public function getResetPassword($token)
    {
        $user = User::whereEmailToken($token)->first();

        if ($user) {
            return view('auth::password.create_password', ['id' => $user->id]);
        } else
            abort(403);
    }

    public function postResetPassword($id, Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::findOrFail($id);
        
        $user->password = bcrypt($request->password);

        $user->activated = true;

        $user->email_token = null;

        $user->save();

        auth()->loginUsingId($id);

        return redirect('/dashboard');
    }
	
}