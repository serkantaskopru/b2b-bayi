<?php

namespace App\Http\Controllers\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\App\Setting\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.roles.view');
    }
    public function fetch(): \Illuminate\Http\JsonResponse
    {
        $roles = Role::all();

        $data = [
            "draw" => 1,
            "recordsTotal" => $roles->count(),
            "recordsFiltered" => $roles->count(),
            "data" => $roles
        ];

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function edit(Role $role): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('app.pages.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function updatePermissions(Request $request, Role $role): \Illuminate\Http\RedirectResponse
    {
        $permissions = $request->input('permissions', []);

        // Sync permissions
        $role->syncPermissions($permissions);

        return redirect()->route('roles.edit', $role)->with('success', 'Permissions updated successfully.');
    }
}
