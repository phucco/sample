<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->can('view admins');
    }

    public function view(Admin $admin)
    {
        return $admin->can('read admins');
    }

    public function create(Admin $admin)
    {
        return $admin->can('create admins');
    }

    public function update(Admin $admin)
    {
        return $admin->can('edit admins');
    }

    public function delete(Admin $admin)
    {
        return $admin->can('delete admins');
    }
}
