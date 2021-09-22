<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MultiTenantModelTrait;

class Post extends Model
{
    use HasFactory, MultiTenantModelTrait;

    protected $fillable = [
    	'title',
    	'category_id',
    	'description',
    	'content',
    	'thumbnail',
    	'active'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'admin_id');
    }
}
