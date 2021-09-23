<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
    	$data = '';
    	$user = auth()->user();
    	$data = $user->hasRole('admin');


  //       $dev_permission = Permission::where('slug','create-posts')->first();
		// $manager_permission = Permission::where('slug', 'edit-users')->first();

		// $dev_role = Role::where('slug','developer')->first();
		// $manager_role = Role::where('slug', 'manager')->first();

		// $createTasks = new Permission();
		// $createTasks->slug = 'create-tasks';
		// $createTasks->title = 'Create Tasks';
		// $createTasks->save();
		// $createTasks->roles()->attach($dev_role);

		// $editUsers = new Permission();
		// $editUsers->slug = 'edit-users';
		// $editUsers->title = 'Edit Users';
		// $editUsers->save();
		// $editUsers->roles()->attach($manager_role);

		// $dev_role = Role::where('slug','developer')->first();
		// $manager_role = Role::where('slug', 'manager')->first();
		// $dev_perm = Permission::where('slug','create-posts')->first();
		// $manager_perm = Permission::where('slug','edit-users')->first();

		// $developer = new Admin();
		// $developer->name = 'Harsukh Makwana';
		// $developer->email = 'harsukh21@gmail.com';
		// $developer->password = bcrypt('harsukh21');
		// $developer->save();
		// $developer->roles()->attach($dev_role);
		// $developer->permissions()->attach($dev_perm);

		// $manager = new Admin();
		// $manager->name = 'Jitesh Meniya';
		// $manager->email = 'jitesh21@gmail.com';
		// $manager->password = bcrypt('jitesh21');
		// $manager->save();
		// $manager->roles()->attach($manager_role);
		// $manager->permissions()->attach($manager_perm);

		
        return view('backend.home.dashboard', ['data' => $data]);

        // dd($user->hasPermissionTo('create-tasks'));
    }
}
