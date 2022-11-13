<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.page.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $user->load(['roles', 'permissions']);
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        return view('admin.page.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user, ToastrFactory $flasher)
    {

        $data = $request->validate([
            'name' => 'nullable|string',
            'email' => 'required_without:cellphone|nullable|email|unique:users,email,' . $user->id,
            'cellphone' => 'required_without:email|nullable|numeric|unique:users,cellphone,' . $user->id,
            'role' => 'nullable|string',
            'permissions' => 'nullable|array',
        ]);
        try {
            DB::beginTransaction();
            $user->update(Arr::except($data, ['role']));
            $user->syncRoles($data['role'] != 'false' ? [$data['role']] : []);
            $user->syncPermissions($data['permissions'] ?? []);
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $flasher->addError($ex->getMessage());
            return redirect()->route('admin.users.index');
        }

        $flasher->addSuccess('کاربر با موفقیت ویرایش شد');
        return redirect()->back();
    }
    public function show(User $user)
    {
        $orders = Order::where('user_id', $user->id)->latest()->paginate(10, ['*'], 'orders')->withQueryString();
        $comments = Comment::where('user_id', $user->id)->latest()->paginate(10, ['*'], 'comments')->withQueryString();

        return view('admin.page.users.show', compact('user', 'orders', 'comments'));
    }
}
