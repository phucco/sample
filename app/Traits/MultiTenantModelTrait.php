<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->title, '-');
            if (Schema::hasColumn($model->table, 'admin_id')) {
                $model->admin_id = auth()->id();
            }            
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
