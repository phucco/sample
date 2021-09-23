<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\AdminService;
use App\Http\Requests\AdminStoreRequest;
use App\Models\Admin;
use App\Http\Services\RoleService;

class AdminController extends Controller
{
    protected $adminService, $roleService;
    
	public function __construct(AdminService $adminService, RoleService $roleService)
	{
		$this->adminService = $adminService;
        $this->roleService = $roleService;
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
    	return view('backend.admin.edit', ['admin' => $admin]);
    }

    public function update(Request $request, Admin $admin)
    {
    	dd($request);
    }
}
