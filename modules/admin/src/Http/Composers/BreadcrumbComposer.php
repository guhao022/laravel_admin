<?php

namespace Modules\Admin\Composers;

use Illuminate\Support\Facades\Route;
use Modules\Admin\Models\AdminPermissions;
use Modules\Admin\Repositories\RoleRepository;
use Illuminate\Contracts\View\View;
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

    private $breadcrumb;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;

        $this->admin = auth()->guard('admin')->user();

        $this->breadcrumb = [];
    }

    /**
     * compose.
     *
     * @param View $view 视图对象
     */
    public function compose(View $view)
    {

        if(Route::currentRouteName() !=='admin.home') {

            $currentMenu = AdminPermissions::where('name',Route::currentRouteName())->first();

            $this->breadcrumb[] = $currentMenu;

            if ($currentMenu->pid > 0) {

                $this->getBreadcrumb($currentMenu->pid);

            }

            krsort($this->breadcrumb);

        }

        $view->with(['breadcrumb' => $this->breadcrumb]);

    }

    protected function getBreadcrumb($pid)
    {
        $menu = AdminPermissions::find($pid);

        $this->breadcrumb[] = $menu;

        if ($menu->pid > 0) {

            $this->getBreadcrumb($menu->pid);

        }
    }
}
