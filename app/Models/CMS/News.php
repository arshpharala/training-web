<?php

namespace App\Models\CMS;

use App\Models\Catalog\Category;
use App\Trait\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasMeta, SoftDeletes;
    protected $fillable = ['slug', 'banner', 'position', 'category_id', 'is_guide', 'created_by', 'color'];

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function translation()
    {
        return $this->hasOne(NewsTranslation::class)->where('news_translations.locale', app()->getLocale());
    }
    public function translations()
    {
        return $this->hasMany(NewsTranslation::class);
    }
}
