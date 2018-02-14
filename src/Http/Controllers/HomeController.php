<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:22
 */

namespace Modules\Admin\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        return admin_view("index");
    }

    public function changMod(Request $request) {
        $mod = $request->mod;

        $request->session()->put('_mod', $mod);

        //return session('_mod');
    }

}