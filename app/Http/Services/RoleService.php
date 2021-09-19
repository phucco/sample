<?php

namespace App\Http\Services;

use App\Models\Role;

class RoleService
{
	public function getAll()
	{
		return Role::orderBy('id', 'asc')->get();
	}

	public function create($request)
	{
		try {
			Role::create($request->only('name'));
		} catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function update($request, $role)
	{
		try {
			$role->update($request->only('name'));
		}catch (\Exception $error) {
			return false;
		}

		return true;
	}

	public function destroy($note)
	{
		try {
			$note->delete();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}
}