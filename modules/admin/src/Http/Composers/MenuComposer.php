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
 * 后台视图组织.
 *
 * @author guhao <378999587@qq.com>
 */
class MenuComposer
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

        $Permission = AdminPermissions::where('fid','0')->orWhere('is_menu', '1')->get();

        $treeMenu = $this->roleRepository->tree($Permission);

        $currentMenu = AdminPermissions::where('name',Route::currentRouteName())->first();

        $view->with(['menus' => $treeMenu, 'current_menu' => $currentMenu]);

    }
}