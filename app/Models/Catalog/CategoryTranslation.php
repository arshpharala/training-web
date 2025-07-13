<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
