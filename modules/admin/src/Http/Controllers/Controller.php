<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/13
 * Time: 下午4:23
 */

namespace Modules\Admin\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{
    use /*AuthorizesRequests, DispatchesJobs,*/ ValidatesRequests;

    public function __construct() {
        //
    }
}