<?php

namespace App\Http\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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
		} catch (\Exception $error) {
			return false;
		}
		
		return true;
	}

	public function update($request, $admin)
	{
		try {
			$admin->update($request->only('name', 'email'));
		} catch (\Exception $error) {
			return false;
		}
		
		return true;
	}
}