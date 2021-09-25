<?php

namespace App\Policies;

use Spatie\Permission\Models\Role;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->can('view roles');
    }

    public function view(Admin $admin, Role $role)
    {
        return $admin->can('read roles');
    }

    public function create(Admin $admin)
    {
        return $admin->can('create roles');
    }

    public function update(Admin $admin, Role $role)
    {
        return $admin->can('edit roles');
    }

    public function delete(Admin $admin, Role $role)
    {
        return $admin->can('delete roles');
    }
}
