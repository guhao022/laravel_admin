<?php

namespace Modules\Admin\Controllers;

use Modules\Admin\Models\AdminPermissions;
use Modules\Admin\Models\AdminRoles;
use Modules\Admin\Repositories\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    protected $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = AdminRoles::all();

        $permission = AdminPermissions::all();

        return admin_view('role.index',['roles'=>$roles,'permission'=>$permission]);
    }

    public function create()
    {
        $permissions = AdminPermissions::all();

        $treeMenu = $this->roleRepository->tree($permissions);

        return admin_view('role.create', ['permissions' => $permissions]);
    }

    public function store(RoleCreateRequest $request)
    {
        $this->role->createRoleAndSavePermission($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $return_array = $this->role->getRoleInfo($id);

        return view('admin::role.edit',$return_array);
    }

    public function update(Request $request, $id)
    {
        $role = $this->role->updateRoleAndPermission($request,$id);
        return redirect(route('role.index'))->with('status', '编辑角色:'.$role->display_name.'成功');
    }

    public function destroy($id)
    {
        //
        $delete =  AdminRoles::find($id)->delete();

        if ($delete) {
            return redirect()->back()->with('status', '删除角色成功');
        }

    }
}
