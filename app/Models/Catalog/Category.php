<?php

namespace App\Models\Catalog;

use App\Trait\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasMeta, SoftDeletes;
    protected $guarded = ['id'];

    public $casts = [
        'is_featured' => 'boolean',
        'blog_only' => 'boolean',
    ];


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


    function scopeCatalog($query)
    {
        return $query->where('blog_only', false);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function translation()
    {
        return $this->hasOne(CategoryTranslation::class)->where('category_translations.locale', app()->getLocale());
    }
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    function scopeWithJoins($query)
    {
        return $query->leftJoin('category_translations', function ($join) {
            $join->on('categories.id', '=', 'category_translations.category_id')->where('category_translations.locale', app()->getLocale());
        });
    }

    function scopeWithSelection($query)
    {
        return $query->addSelect('categories.*', 'category_translations.name', 'category_translations.short_description', 'category_translations.locale');
    }
}
