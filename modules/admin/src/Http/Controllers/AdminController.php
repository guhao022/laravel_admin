<?php

namespace App\Http\Controllers\Admin;

use Modules\Admin\Models\AdminUser;
use Modules\Admin\Models\AdminRoles;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\EditAdminPostRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Modules\Admin\Repositories\AdminRepository;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $admin;

    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = AdminUser::all();

        $roles = AdminRoles::all(['id','display_name']);

        return view('admin::user.index',['admins'=>$admins,'roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateRequest $request)
    {
        //

        $this->admin->createAdminAndSaveRole($request);

        return response('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = AdminUser::find($id);
        $roles = AdminRoles::all(['id','name','display_name']);
        return view('admin::user.edit',['admin'=>$admin,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAdminPostRequest $request, $id)
    {
        $admin = $this->admin->updateAdminAndRole($request,$id);
        return redirect(route('admin.index'))->with('status', '编辑用户:'.$admin->name.'成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $delete =  AdminUser::find($id)->delete();

        if ($delete) {
            return redirect()->back()->with('status', '删除用户成功');
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
