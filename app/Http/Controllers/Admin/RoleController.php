<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\RoleService;
use App\Http\Services\PermissionService;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Helpers\Helper;

class RoleController extends Controller
{
    protected $roleService, $permissionService;

    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
        $this->authorizeResource(Role::class, 'role');
    }

    public function index()
    {
        $roles = $this->roleService->getAll();

        return view('backend.role.index', ['roles' => $roles]);
    }
    
    public function create()
    {
        $permissions = $this->permissionService->getPermissionList();

        return view('backend.role.create', ['permissions' => $permissions]);
    }
    
    public function store(RoleRequest $request)
    {
        $result = $this->roleService->create($request);

        if ($result) return redirect()->route('admin.roles.index')->with('success', 'New role has been created.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
    
    public function show(Role $role)
    {
        return view('backend.role.show', ['role' => $role]);
    }
    
    public function edit(Role $role)
    {
        $permissions = $this->permissionService->getPermissionList();

        return view('backend.role.edit', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }
    
    public function update(RoleRequest $request, Role $role)
    {
        $result = $this->roleService->update($request, $role);

        if ($result) return redirect()->route('admin.roles.index')->with('success', 'Role has been updated.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
    
    public function destroy(Role $role)
    {
        $result = $this->roleService->destroy($role);

        if ($result) return redirect()->route('admin.roles.index')->with('success', 'Role has been deleted.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
}
