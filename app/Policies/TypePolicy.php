<?php

namespace App\Policies;

use App\Models\Type;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypePolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->can('view types');
    }

    public function view(Admin $admin, Type $type)
    {
        return $admin->can('read types');
    }

    public function create(Admin $admin)
    {
        return $admin->can('create types');
    }

    public function update(Admin $admin, Type $type)
    {
        return $admin->can('edit types');
    }

    public function delete(Admin $admin, Type $type)
    {
        return $admin->can('delete types');
    }
}
