<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:22
 */

namespace Modules\Admin\Controllers;

use Illuminate\Support\Facades\Auth;
use Modules\Admin\Facades\AdminHelper;

class HomeController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        return view("admin::index");
    }

}