<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    protected $guarded = ['id'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
