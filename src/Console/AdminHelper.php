<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/15
 * Time: 下午12:13
 */

namespace Modules\Admin\Handle;

use Illuminate\Support\Facades\Auth;

class AdminHelper
{

    /**
     * @name admin user
     * @return mixed
     */
    public function user()
    {
        return Auth::guard('admin')->user();
    }

}