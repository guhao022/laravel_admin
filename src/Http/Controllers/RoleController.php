<?php

namespace Modules\Admin\Controllers;

use Modules\Admin\Models\AdminPermissions;
use Modules\Admin\Models\AdminRoles;
use Modules\Admin\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Modules\Admin\Validation\Role\Create;
use Modules\Admin\Validation\Role\Update;

class RoleController extends Controller
{

    protected $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = AdminRoles::paginate(config('admin.pagination.number'));

        return admin_view('role.index',['roles'=>$roles]);
    }

    public function create()
    {
        $permissions = AdminPermissions::all();

        $treeMenu = $this->role->tree($permissions);

        return admin_view('role.create', ['tree_menu' => $treeMenu]);
    }

    public function store(Create $request)
    {
        $this->role->createRoleAndSavePermission($request);

        return redirect(route('role.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $return_array = $this->role->getRoleInfo($id);

        return admin_view('role.edit',$return_array);
    }

    public function update(Update $request, $id)
    {

        $role = $this->role->updateRoleAndPermission($request,$id);

        return redirect(route('role.index'))->with('message', '编辑角色: '.$role->display_name.' 成功');

    }

    public function destroy($id)
    {
        $delete =  AdminRoles::find($id)->delete();

        if ($delete) {
            return response()->json(['status'=>true, 'message'=>'删除成功']);
        } else {
            return response()->json(['status'=>false, 'message'=>'删除失败']);
        }

    }
}
