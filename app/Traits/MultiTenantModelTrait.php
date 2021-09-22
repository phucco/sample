<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        static::creating(function ($model) {
            $model->slug = Str::slug($model->title, '-');
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
