<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\RoleService;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Helpers\Helper;

class RoleController extends Controller
{
    public function __construct(RoleService $roleService)
    {
        // $this->middleware('admin');
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roleService->getAll();

        return view('backend.role.index', ['roles' => $roles]);
    }
    
    public function create()
    {
        return view('backend.role.create', [
            'modules' => Helper::getAllModules(),
            'actions' => Helper::getAllActions(),
        ]);
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
        return view('backend.role.edit', [
            'role' => $role,
            'modules' => Helper::getAllModules(),
            'actions' => Helper::getAllActions(),
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

    public function attachPermission(Request $request)
    {
        $this->roleService->attachPermission($request);
    }

    public function detachPermission(Request $request)
    {
        $this->roleService->detachPermission($request);
    }
}
