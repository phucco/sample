<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
    	$data = '';
    	$admin = auth()->user();

// $admin->assignRole('super admin');
    	// dd($admin->hasRole('super admin'));
    	$role = Role::where('name', 'admin')->first();
    	// Permission::create(['name' => 'create roles']);
        
    	// $role->givePermissionTo('view posts', 'view categories', 'view admins', 'view roles', 'view permissions');
    	// dd($admin->can('read roles'));
    	// dd($role->hasPermissionTo('create roles','edit roles','read roles', 'delete roles'));
		
        return view('backend.home.dashboard', ['data' => $data]);

        // dd($user->can('delete-roles'));
    }
}
