<?php

namespace App\Models\Catalog;

use App\Trait\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasMeta, SoftDeletes;
    protected $guarded = ['id'];

    public function translation()
    {
        return $this->hasOne(CourseTranslation::class)->where('course_translations.locale', app()->getLocale());
    }
    public function translations()
    {
        return $this->hasMany(CourseTranslation::class);
    }
}
