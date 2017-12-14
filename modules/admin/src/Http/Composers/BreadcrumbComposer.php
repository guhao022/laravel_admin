<?php

namespace Modules\Admin\Composers;

use Illuminate\Support\Facades\Route;
use Modules\Admin\Models\AdminPermissions;
use Modules\Admin\Repositories\RoleRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;
use Auth;

/**
 * 面包屑导航.
 *
 * @author guhao <378999587@qq.com>
 */
class BreadcrumbComposer
{
    private $roleRepository;

    private $admin;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;

        $this->admin = auth()->guard('admin')->user();
    }

    /**
     * compose.
     *
     * @param View $view 视图对象
     */
    public function compose(View $view)
    {

        $currentMenu = AdminPermissions::where('name',Route::currentRouteName())->first();

        if($this->admin->can($currentMenu->name) || $this->admin->hasRole('admin')) {
            return response('您没有权限执行当前操作', 401);
        }

        if ($currentMenu->pid > 0) {
            $parentMenu = AdminPermissions::find($currentMenu->pid);
        }

        $view->with(['current_menu' => $currentMenu]);

    }

    protected function getParentMenu($pid)
    {
        //
    }
}
