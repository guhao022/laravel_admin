<?php
/**
 * Created by PhpStorm.
 * User: code
 * Date: 2017/9/15
 * Time: 下午12:12
 */

namespace Modules\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class Avatar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "avatar";
    }
}
