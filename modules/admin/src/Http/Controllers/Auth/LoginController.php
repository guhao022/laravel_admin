<?php

namespace Modules\Hive\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Hive\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;/* {
        login as authenticatesUsersLogin;
    }*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    /*public function login(Request $request)
    {
        $request->merge([
            $this->username() => $request->input('phone'),
        ]);

        return $this->authenticatesUsersLogin($request);
    }*/

    /**
     * @return mixed
     */
    protected function guard()
    {
        return Auth::guard('hive');
    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected function username(): string
    {
        return "phone";
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     * @author Seven Du <shiweidu@outlook.com>
     */
    protected $redirectTo = '/';
}
