<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->can('view categories');
    }

    public function view(Admin $admin, Category $category)
    {
        return $admin->can('read categories');
    }

    public function create(Admin $admin)
    {
        return $admin->can('create categories');
    }

    public function update(Admin $admin, Category $category)
    {
        return $admin->can('edit categories');
    }

    public function delete(Admin $admin, Category $category)
    {
        return $admin->can('delete categories');
    }
}
