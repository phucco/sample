<?php

namespace App\Http\Services\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleService
{
	public function getAll()
	{
		return Role::orderBy('id', 'asc')->paginate(10);
	}

	public function create($request)
	{
		try {
			$role = Role::create($request->only('name'));
			$role->syncPermissions($request->input('permissions'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function update($request, $role)
	{
		try {
			$role->update($request->only('title'));
			$role->syncPermissions($request->input('permissions'));
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
		return Role::get(['name']);
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