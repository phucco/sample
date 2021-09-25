<?php

namespace App\Policies;

use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->can('view permissions');
    }

    public function view(Admin $admin, Role $role)
    {
        return $admin->can('read permissions');
    }

    public function create(Admin $admin)
    {
        return $admin->can('create permissions');
    }

    public function update(Admin $admin, Role $role)
    {
        return $admin->can('edit permissions');
    }

    public function delete(Admin $admin, Role $role)
    {
        return $admin->can('delete permissions');
    }
}
