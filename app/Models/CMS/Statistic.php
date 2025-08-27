<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'number',
        'is_active',
        'icon',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    function translations()
    {
        return $this->hasMany(StatisticTranslation::class);
    }

    function translation()
    {
        return $this->hasOne(StatisticTranslation::class)->where('locale', app()->getLocale());
    }
}
