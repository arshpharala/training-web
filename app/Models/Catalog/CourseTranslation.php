<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class CourseTranslation extends Model
{
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
