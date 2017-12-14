<?php

namespace Modules\Admin\Models;

use Zizaco\Entrust\EntrustPermission;

class AdminPermissions extends EntrustPermission
{
    //

    public $fillable = ['name','display_name','description','route_name','pid'];

    public function parentName($pid)
    {
        switch($pid){
            case '0': return '顶级分类';break;
            default : $parent = self::where('id',$pid)->first(); return $parent->display_name;
        }
    }
}
