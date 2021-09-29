<?php

namespace App\Http\Services\Admin;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminService
{
	public function getAll()
	{
		return Admin::with('roles')->orderBy('id', 'asc')->paginate(10);
	}

	public function create($request)
	{
		try {
			$admin = Admin::create([
	            'name' => $request->input('name'),
	            'email' => $request->input('email'),
	            'password' => Hash::make($request->input('password')),
	        ]);
	        $admin->syncRoles($request->input('roles'));
		} catch (\Exception $error) {
			return false;
		}
		
		return true;
	}

	public function update($request, $admin)
	{
		try {
			$admin->update($request->only('name', 'email'));
			$admin->syncRoles($request->input('roles'));
		} catch (\Exception $error) {
			return false;
		}
		
		return true;
	}

	public function destroy($admin)
	{
		try {
			$admin->delete();
		} catch (\Exception $error) {
			return false;
		}
		
		return true;
	}
}