<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Exam extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'duration', 'level', 'accreditation_id', 'image', 'code', 'description'];

    function courses()
    {
        return $this->belongsToMany(Course::class, 'course_exam', 'exam_id', 'course_id');
    }

    public static function sync(Request $request, $model)
    {
        $examIds = $request->input('exams', []);
        $model->exams()->sync($examIds);
    }
}
