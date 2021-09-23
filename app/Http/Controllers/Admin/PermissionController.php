<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\PermissionService;
use App\Models\Permission;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        $permissions = $this->permissionService->getAll();

        return view('backend.permission.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('backend.permission.create');
    }

    public function store(Request $request)
    {
        $result = $this->permissionService->create($request);

        if ($result) return redirect()->route('admin.permissions.index')->with('success', 'New permission has been created.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function show(Permission $permission)
    {
        return view('backend.permission.show', ['permission' => $permission]);
    }

    public function destroy(Permission $permission)
    {
        $result = $this->permissionService->destroy($permission);

        if ($result) return redirect()->route('admin.permissions.index')->with('success', 'Permission has been deleted.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
}
