<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\ActivityService;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
    	$this->activityService = $activityService;
    }

    public function index()
    {
    	$activities = $this->activityService->getAll();

    	return view('backend.activity.index', ['activities' => $activities]);
    }
}
