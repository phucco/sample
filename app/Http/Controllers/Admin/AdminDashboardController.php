<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
    	$data = '';
    	$user = auth()->user();
		
        return view('backend.home.dashboard', ['data' => $data]);

        // dd($user->can('delete-admins'));
    }
}
