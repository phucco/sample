<?php

namespace App\Http\Services\Admin;

use App\Models\Activity;

class ActivityService
{
	public function getAll()
	{
		return Activity::with('causer')->orderBy('created_at', 'desc')->paginate(10);
	}
}