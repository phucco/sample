<?php 

namespace App\Http\Services;

use Spatie\Permission\Models\Permission;

class PermissionService
{
	public function getAll()
	{
		return Permission::paginate(10);
	}

	public function create($request)
	{
		$data = ['name' => $request->input('action') . ' ' . $request->input('module')];
		try {
			Permission::create($data);
		} catch (\Exception $error) {
			dd($error->getMessage());
			return false;
		}

		return true;
	}

	public function destroy($permission)
	{
		try {
			$permission->delete();
		} catch (\Exception $error) {
            return false;
		}

		return true;
	}

	public function getPermissionList()
	{
		return Permission::get('name');
	}
}