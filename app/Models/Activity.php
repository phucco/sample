<?php

namespace App\Models;

use Spatie\Activitylog\Models\Activity as SpatieActivity;

class Activity extends SpatieActivity
{
	public $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->causer->name ?? null;
    }
}
