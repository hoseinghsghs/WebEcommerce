<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.roles.index', [
            'roles' => Role::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.roles.create', ['permissions' => Permission::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ToastrFactory $flasher)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required|unique:roles',
            'permissions' => 'nullable|array',
        ]);

        try {
            DB::beginTransaction();
            $role = Role::create(['name' => $data['name'], 'display_name' => $data['display_name']]);
            $role->syncPermissions($data['permissions']??[]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $flasher->addError($ex->getMessage());
            return redirect()->route('admin.roles.index');
        }

        $flasher->addSuccess('نقش کاربری با موفقیت ایجاد شد');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role->load('permissions');
        return view('admin.page.roles.edit', [
            'role' => $role,
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role, ToastrFactory $flasher)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'display_name' => 'required|unique:roles,display_name,' . $role->id,
            'permissions' => 'nullable|array',
        ]);
        try {
            DB::beginTransaction();
            $role->update(['name' => $data['name'], 'display_name' => $data['display_name']]);
            $role->syncPermissions($data['permissions']??[]);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $flasher->addError($ex->getMessage());
            return redirect()->route('admin.roles.index');
        }
        $flasher->addSuccess('تغییرات با موفقیت ثبت شد');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        alert()->success('نقش مورد نظر با موفقیت حذف گردید.')->timerProgressBar()->toToast();
        return redirect()->back();
    }
}
