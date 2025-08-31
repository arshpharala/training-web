<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    public $incrementing    = false;
    protected $keyType      = 'string';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'logo',
        'is_active',
        'position'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    function scopeActive($query)
    {
        $query->where('partners.is_active', 1);
    }
}
