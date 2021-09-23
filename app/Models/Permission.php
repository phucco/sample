<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    use MultiTenantModelTrait;

    protected $fillable = ['title'];

    public function roles() {
        return $this->belongsToMany(Role::class,'roles_permissions');       
    }

    public function admins() {
        return $this->belongsToMany(Admin::class,'admins_permissions');       
    }
}
