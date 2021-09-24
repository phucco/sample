<?php

namespace App\Http\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class AdminService
{
	public function getAll()
	{
		return Admin::orderBy('id', 'asc')->paginate(10);
	}

	public function create($request)
	{
		try {
			$admin = Admin::create([
	            'name' => $request->input('name'),
	            'email' => $request->input('email'),
	            'password' => Hash::make($request->input('password')),
	        ]);

	        $role = Role::where('slug', $request->input('role'))->first();
	        $admin->roles()->attach($role);

		} catch (\Exception $error) {
			return false;
		}
		
		return true;
	}

	public function update($request, $admin)
	{
		try {
			$admin->update($request->only('name', 'email'));

			$roleSlug = $request->input('role');
			$currentRoleSlug = $admin->roles[0]->title;

			if ($roleSlug != $currentRoleSlug) {
				$admin->roles()->detach(Role::where('slug', $currentRoleSlug)->first());
				$role = Role::where('slug', $roleSlug)->first();
	        	$admin->roles()->attach($role);
			}

		} catch (\Exception $error) {
			return false;
		}
		
		return true;
	}
}