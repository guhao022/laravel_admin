<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/14
 * Time: 下午5:45
 */

namespace Modules\Admin\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Controllers\Controller;

class AuthController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Login page.
     *
     * @return \Illuminate\Contracts\View\Factory|Redirect|\Illuminate\View\View
     */
    public function getLogin()
    {
        if (!Auth::guard('admin')->guest()) {
            return redirect(config('admin.route.prefix'));
        }
        return admin_view('login');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $validator = Validator::make($credentials, [
            'email' => 'required', 'password' => 'required',
        ]);

        if ($validator->fails()) {

            return Redirect::back()->withInput()->withErrors($validator);
        }
        if (Auth::guard('admin')->attempt($credentials)) {

            Auth::guard('admin')->user()->last_login = new \DateTime();
            Auth::guard('admin')->user()->save();

            return redirect()->intended(config('admin.route.prefix'));
        }
        return Redirect::back()->withInput()->withErrors(['email' => $this->getFailedLoginMessage()]);
    }

    /**
     * User logout.
     *
     * @return Redirect
     */
    public function postLogout()
    {
        Auth::guard('admin')->logout();
        session()->forget('url.intented');
        return redirect(config('admin.route.prefix'));
    }

    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
            ? trans('auth.failed')
            : 'These credentials do not match our records.';
    }

}