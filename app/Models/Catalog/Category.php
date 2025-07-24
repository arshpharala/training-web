<?php

namespace App\Models\Catalog;

use App\Trait\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasMeta, SoftDeletes;
    protected $guarded = ['id'];

    public function translation()
    {
        return $this->hasOne(CategoryTranslation::class)->where('category_translations.locale', app()->getLocale());
    }
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
}
