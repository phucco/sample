<?php

namespace App\Http\Services;

use App\Models\Role;
use App\Models\Permission;

class RoleService
{
	public function getAll()
	{
		return Role::orderBy('id', 'asc')->paginate(10);
	}

	public function create($request)
	{
		$permissionSlugs = $request->except('_token', 'title');

		try {
			$role = Role::create($request->only('title'));

			foreach ($permissionSlugs as $permissionSlug => $value) {
				$permission = Permission::where('slug', $permissionSlug)->first();
				$permission->roles()->attach($role);
			}

		} catch (\Exception $error) {
			// dd($error->getMessage());
			return false;
		}

		return true;
	}

	public function update($request, $role)
	{
		try {
			$role->update($request->only('title'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function destroy($role)
	{
		try {
			$role->delete();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}

	public function getRoleList()
	{
		return Role::get(['slug', 'title']);
	}

	public function attachPermission($request)
	{
		try {
			$role = Role::where('slug', $request->input('role'))->first();
			$permission = Permission::where('slug', $request->input('permission'))->first();

			$permission->roles()->attach($role);
		} catch (\Exception $error) {
			return false;
		}

		return true;		
	}

	public function detachPermission($request)
	{
		try {
			$role = Role::where('slug', $request->input('role'))->first();
			$permission = Permission::where('slug', $request->input('permission'))->first();

			$permission->roles()->detach($role);
		} catch (\Exception $error) {
			return false;
		}

		return true;		
	}
}