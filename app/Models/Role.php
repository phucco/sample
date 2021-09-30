<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends SpatieRole
{
	use LogsActivity;
}
