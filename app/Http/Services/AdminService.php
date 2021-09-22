<?php

namespace App\Http\Services;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminService
{
	public function getAll()
	{
		return Admin::orderBy('id', 'asc')->paginate();
	}

	public function create($request)
	{
		try {
			Admin::create([
	            'name' => $request->input('name'),
	            'email' => $request->input('email'),
	            'password' => Hash::make($request->input('password')),
	        ]);
		} catch (\Exception $error) {
			return false;
		}
		
		return true;
	}

	public function show($id)
	{
		return Admin::findOrFail($id);
	}
}