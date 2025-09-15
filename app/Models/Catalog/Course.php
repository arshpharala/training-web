<?php

namespace App\Models\Catalog;

use App\Trait\HasFaqs;
use App\Trait\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasMeta, SoftDeletes, HasFaqs;
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

    function outcomes()
    {
        return $this->hasMany(CourseOutcome::class);
    }

    function syllabus()
    {
        return $this->hasMany(CourseSyllabus::class);
    }

    function deliveryMethods()
    {
        return $this->belongsToMany(DeliveryMethod::class, 'course_delivery_methods');
    }


    function scopeWithJoins($query)
    {
        return $query->join('course_translations', function ($join) {
            $join->on('courses.id', 'course_translations.course_id')
                ->where('course_translations.locale', app()->getLocale());
        })
            ->join('topics', 'courses.topic_id', 'topics.id')
            ->join('topic_translations', function ($join) {
                $join->on('topics.id', 'topic_translations.topic_id')->where('topic_translations.locale', app()->getLocale());
            })
            ->join('categories', 'topics.category_id', 'categories.id')
            ->join('category_translations', function ($join) {
                $join->on('categories.id', 'category_translations.category_id')
                    ->where('category_translations.locale', app()->getLocale());
            });
    }

    function scopeWithSelection($query)
    {
        return $query->select(
            'courses.id',
            'courses.logo',
            'courses.banner',
            'courses.icon',
            'courses.color',
            'courses.duration',
            'courses.default_price',
            'courses.is_featured',
            'courses.is_latest',
            'courses.slug as course_slug',
            'course_translations.name as course_name',
            'course_translations.short_description as short_description',
            'topics.id as topic_id',
            'topics.slug as topic_slug',
            'topic_translations.name as topic_name',
            'categories.id as category_id',
            'categories.slug as category_slug',
            'category_translations.name as category_name',
        );
    }
}
