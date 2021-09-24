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
		
        return view('backend.home.dashboard', ['data' => $data]);

        // dd($user->can('delete-admins'));
    }
}
