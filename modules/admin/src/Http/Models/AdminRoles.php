<?php

namespace Modules\Admin\Models;

use Zizaco\Entrust\EntrustRole;


class AdminRoles extends EntrustRole
{
    //

    public function users()
    {
        return $this->belongsToMany(config('admin.auth.providers.admin.model'), config('entrust.role_user_table'),config('entrust.role_foreign_key'),config('entrust.user_foreign_key'));
        // return $this->belongsToMany(Config::get('auth.model'), Config::get('entrust.role_user_table'));
    }
}
