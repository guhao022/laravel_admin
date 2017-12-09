<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/14
 * Time: 下午5:45
 */

namespace Modules\Admin\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        return view('admin::login');
    }
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only(['username', 'password']);
        $validator = Validator::make($credentials, [
            'username' => 'required', 'password' => 'required',
        ]);

        if ($validator->fails()) {

            return Redirect::back()->withInput()->withErrors($validator);
        }
        if (Auth::guard('admin')->attempt($credentials)) {
            //admin_toastr(trans('admin.login_successful'));
            return redirect()->intended(config('admin.route.prefix'));
        }
        return Redirect::back()->withInput()->withErrors(['username' => $this->getFailedLoginMessage()]);
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