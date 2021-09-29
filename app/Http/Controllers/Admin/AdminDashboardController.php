<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
    	$data = '';
    	$admin = auth()->user();

// $admin->assignRole('super admin');
    	// dd($admin->hasRole('super admin'));
        dd($admin->can('edit types'));
    	$role = Role::where('name', 'admin')->first();
    	// Permission::create(['name' => 'create roles']);
        
    	// $role->givePermissionTo('view posts', 'view categories', 'view admins', 'view roles', 'view permissions');
    	// dd($admin->can('read roles'));
    	// dd($role->hasPermissionTo('create roles','edit roles','read roles', 'delete roles'));



    $str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $last = explode("/", $str, 3);
    $routeAction = Route::getCurrentRoute()->action['as'];
    $module = str_replace('admin.', '', $routeAction);
    $dotPosition = strpos($module, '.');
    dd(substr($module,0, $dotPosition));
    dd($module);

    if(isset($last[2])) {
        $data = $last;
    }
    

		
        return view('backend.home.dashboard', ['data' => $data]);

        // dd($user->can('delete-roles'));
    }
}
