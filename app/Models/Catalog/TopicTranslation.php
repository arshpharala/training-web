<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class TopicTranslation extends Model
{
    protected $guarded = ['id'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
