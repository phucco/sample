<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Models\Activity;

class AdminDashboardController extends Controller
{
    public function showDashboard()
    {
    	$data = '';
    	$admin = auth()->user();

        $activity = Activity::all()->last();

        dd($activity);
		
        return view('backend.home.dashboard', ['data' => $data]);

        // dd($user->can('delete-roles'));
    }
}
