<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\AdminService;
use App\Http\Requests\AdminStoreRequest;
use App\Models\Admin;

class AdminController extends Controller
{
    protected $adminService;
    
	public function __construct(AdminService $adminService)
	{
		$this->adminService = $adminService;
	}

    public function index()
    {
    	$admins = $this->adminService->getAll();

    	return view('backend.admin.index', ['admins' => $admins]);
    }

    public function create()
    {        
    	return view('backend.admin.create');
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
    	$result = $this->adminService->update($request, $admin);

        if ($result) return redirect()->route('admin.admins.index')->with('success', 'Administrator has been updated.');

        return back()->withInput()->with('error', 'Please try again later.');
    }
}
