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
    private $request;

    private $roleRepository;

    public function __construct(Request $request, RoleRepository $roleRepository)
    {
        $this->request = $request;

        $this->roleRepository = $roleRepository;
    }

    /**
     * compose.
     *
     * @param View $view 视图对象
     */
    public function compose(View $view)
    {

        $user = Auth::guard('admin')->user();

        if ($user->hasRole('admin')) {

            $permissions = AdminPermissions::where('is_menu', 1)->get();

        } else {

            $user_perms = $user->perms;

            $permissions = AdminPermissions::where('is_menu', 1)->get();

        }

        $treeMenu = $this->roleRepository->tree($permissions);

        foreach ($treeMenu as $menu) {

            if ($this->request->is($menu->group_name.'*')) {

                $menus = $menu->children;

                continue;

            }
        }

        print_r($menu);

        $currentMenu = AdminPermissions::where('name',Route::currentRouteName())->first();

        $view->with(['menus' => $menus, 'current_menu' => $currentMenu]);

    }
}
