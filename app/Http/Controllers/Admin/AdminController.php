<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Services\Admin\AdminService;
use App\Http\Services\Admin\RoleService;
use App\Models\Admin;

class AdminController extends Controller
{
    protected $adminService, $roleService;

	public function __construct(AdminService $adminService, RoleService $roleService)
	{
		$this->adminService = $adminService;
        $this->roleService = $roleService;

        $this->authorizeResource(Admin::class, 'admin');
	}

    public function index()
    {
    	$admins = $this->adminService->getAll();

    	return view('backend.admin.index', ['admins' => $admins]);
    }

    public function create()
    {
        $roles = $this->roleService->getRoleList();

    	return view('backend.admin.create', ['roles' => $roles]);
    }

    public function store(AdminStoreRequest $request)
    {
    	$result = $this->adminService->create($request);

        if ($result) return redirect()->route('admin.admins.index')->with('success', 'New administrator has been created.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function show(Admin $admin)
    {
    	return view('backend.admin.show', ['admin' => $admin]);
    }

    public function edit(Admin $admin)
    {
        $roles = $this->roleService->getRoleList();

    	return view('backend.admin.edit', ['admin' => $admin, 'roles' => $roles]);
    }

    public function update(Request $request, Admin $admin)
    {
    	$result = $this->adminService->update($request, $admin);

        if ($result) return redirect()->route('admin.admins.index')->with('success', 'Administrator has been updated.');

        return back()->withInput()->with('error', 'Please try again later.');
    }

    public function destroy(Admin $admin)
    {
        $result = $this->adminService->destroy($admin);

        if ($result) return redirect()->route('admin.admins.index')->with('success', 'Administrator has been deleted.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
}
