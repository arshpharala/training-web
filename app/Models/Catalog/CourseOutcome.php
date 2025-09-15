<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class CourseOutcome extends Model
{
    protected $fillable = ['course_id', 'title', 'description', 'image'];

    function course()
    {
        return $this->belongsTo(Course::class);
    }
}
