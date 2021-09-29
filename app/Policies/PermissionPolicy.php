<?php

namespace App\Policies;

use Spatie\Permission\Models\Permission;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->can('view permissions');
    }

    public function view(Admin $admin, Permission $permission)
    {
        return $admin->can('read permissions');
    }

    public function create(Admin $admin)
    {
        return $admin->can('create permissions');
    }

    public function update(Admin $admin, Permission $permission)
    {
        return $admin->can('edit permissions');
    }

    public function delete(Admin $admin, Permission $permission)
    {
        return $admin->can('delete permissions');
    }
}
