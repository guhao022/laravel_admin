<?php

namespace Modules\Admin\Controllers\Admin;

use Modules\Admin\Models\AdminPermissions;
use Modules\Admin\Repositories\PermissionRepository;
use Modules\Admin\Validation\Permission\Create;
use Modules\Admin\Validation\Permission\Update;

class PermissionController extends Controller
{

    protected $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permission = AdminPermissions::where("pid", "0")->paginate(config('admin.pagination.number'));

        return admin_view('permission.index',['permissions'=>$permission, 'has_child'=>true]);
    }

    public function create()
    {
        $top_permission = AdminPermissions::where("pid", "0")->get();
        return admin_view('permission.create', ["top_menu"=>$top_permission]);
    }

    public function store(Create $request)
    {

        $create = $this->permission->createPermission($request);

        if($create){
            return redirect(route('permission.index'))->with('message', '创建成功');
        }else{
            return redirect(route('permission.index'))->withErrors( '创建失败');
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $return_array = $this->permission->getPermissionInfo($id);

        return admin_view('permission.edit',$return_array);
    }

    public function update(Update $request, $id)
    {
        //
        $update = $this->permission->updatePermissionInfo($request,$id);

        if($update){
            return redirect(route('permission.index'))->with('status', '编辑成功');
        }else{
            return redirect(route('permission.index'))->withErrors( '编辑失败');
        }
    }

    public function destroy($id)
    {
        AdminPermissions::where('pid',$id)->delete();

        AdminPermissions::find($id)->delete();

        return redirect()->back()->with('status', '删除权限成功');
    }

    public function childIndex($id)
    {
        $permission = AdminPermissions::where('pid',$id)->paginate(config('admin.pagination.number'));

        return admin_view('permission.index',['permissions'=>$permission, 'has_child'=>false]);
    }
}
