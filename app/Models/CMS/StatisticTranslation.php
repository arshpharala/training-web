<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class StatisticTranslation extends Model
{
    protected $fillable = [
        'statistic_id',
        'locale',
        'name'
    ];
}
