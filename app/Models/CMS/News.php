<?php

namespace App\Models\CMS;

use App\Models\Catalog\Category;
use App\Trait\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasMeta, SoftDeletes;
    protected $fillable = [
        'category_id',
        'is_guide',
        'position',
        'is_active',
        'slug',
        'author',
        'published_at',
        'thumbnail',
        'image'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_guide' => 'boolean',
        'published_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongTo(Category::class);
    }

    public function translations()
    {
        return $this->hasMany(NewsTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(NewsTranslation::class)->where('locale', app()->getLocale());
    }
}
