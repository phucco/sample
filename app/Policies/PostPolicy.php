<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->can('view posts');
    }

    public function view(Admin $admin, Post $post)
    {
        return $admin->can('read posts') || $admin->id == $post->admin_id;
    }

    public function create(Admin $admin)
    {
        return $admin->can('create posts');
    }

    public function update(Admin $admin, Post $post)
    {
        return $admin->can('edit posts') || $admin->id == $post->admin_id;
    }

    public function delete(Admin $admin, Post $post)
    {
        return $admin->can('delete posts');
    }
}
