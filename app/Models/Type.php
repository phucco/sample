<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\MultiTenantModelTrait;

class Type extends Model
{
    use HasFactory, SoftDeletes, MultiTenantModelTrait;

    protected $fillable = [
    	'title',
    	'description',
    	'active',
    	'thumbnail',
    ];
}
