<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class CourseSyllabus extends Model
{
    protected $table = 'course_syllabus';
    protected $fillable = ['course_id', 'title', 'description', 'image'];

    function course()
    {
        return $this->belongsTo(Course::class);
    }
}
