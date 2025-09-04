<?php

namespace App\Models\Catalog;

use App\Trait\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasMeta, SoftDeletes;
    protected $guarded = ['id'];

    protected static function booted()
    {
        static::saved(function () {
            clear_course_cache();
        });
        static::deleted(function () {
            clear_course_cache();
        });
        static::restored(function () {
            clear_course_cache();
        });
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }


    public function translation()
    {
        return $this->hasOne(CourseTranslation::class)->where('course_translations.locale', app()->getLocale());
    }
    public function translations()
    {
        return $this->hasMany(CourseTranslation::class);
    }

    function deliveryMethods()
    {
        return $this->belongsToMany(DeliveryMethod::class, 'course_delivery_methods');
    }
}
