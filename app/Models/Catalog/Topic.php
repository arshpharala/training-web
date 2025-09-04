<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use SoftDeletes;

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


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function translations()
    {
        return $this->hasMany(TopicTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(TopicTranslation::class)->where('locale', app()->getLocale());
    }
}
