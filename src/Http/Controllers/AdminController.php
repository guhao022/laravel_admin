<?php

namespace Modules\Admin\Controllers;

use Modules\Admin\Models\AdminUser;
use Modules\Admin\Models\AdminRoles;
use Modules\Admin\Requests\AdminCreateRequest;
use Modules\Admin\Requests\EditAdminPostRequest;
use Modules\Admin\Requests\ProfileUpdateRequest;
use Modules\Admin\Repositories\AdminRepository;

class AdminController extends Controller
{
    protected $admin;

    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
    }

    public function index()
    {
        $admins = AdminUser::all();

        return admin_view('user.index',['admins'=>$admins]);
    }

    public function create()
    {
        $roles = AdminRoles::all();

        return admin_view('user.create', ['roles' => $roles]);
    }

    public function store(AdminCreateRequest $request)
    {
        $this->admin->createAdminAndSaveRole($request);

        return redirect(route('admin.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $admin = AdminUser::find($id);

        $roles = AdminRoles::all(['id','name','display_name']);

        return view('admin::user.edit',['admin'=>$admin,'roles'=>$roles]);
    }

    public function update(EditAdminPostRequest $request, $id)
    {
        $admin = $this->admin->updateAdminAndRole($request,$id);

        return redirect(route('admin.index'))->with('status', '编辑用户:'.$admin->name.'成功');
    }

    public function destroy($id)
    {
        $delete =  AdminUser::find($id)->delete();

        if ($delete) {
            return response()->json('status', true);
        }

    }

    public function profileForm()
    {
        return view('admin::user.profile');
    }

    public function profileUpdate(ProfileUpdateRequest $request)
    {

        if($this->admin->updateProfile($request)) {
            return redirect()->back()->with('status', '修改账户信息成功');
        }
        return redirect()->back()->withErrors( '修改账户信息失败，原密码错误');
    }
}
