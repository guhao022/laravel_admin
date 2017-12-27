<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/14
 * Time: 下午5:45
 */

namespace Modules\Admin\Controllers;

use Modules\Admin\Models\AdminRoles;
use Modules\Admin\Models\AdminUser;
use Illuminate\Http\Request;

class JokeController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $admin = AdminUser::all();

        $roles = AdminRoles::all(['id','display_name']);

        return view('admin::user.index',['admin'=>$admin,'roles'=>$roles]);
    }

}