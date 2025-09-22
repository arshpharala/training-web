<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class CourseSyllabus extends Model
{
    protected $table = 'course_syllabi';
    protected $fillable = ['course_id', 'title', 'description', 'image'];

    function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function store($request, $model)
    {
        $inputSyllabi = $request->input('syllabi', []);

        $incomingIds = collect($inputSyllabi)->pluck('id')->filter()->toArray();

        $model->syllabi()->whereNotIn('id', $incomingIds)->delete();

        foreach ($inputSyllabi as $syllabusData) {
            if (!empty($syllabusData['title'])) {
                if (!empty($syllabusData['id'])) {
                    $model->syllabi()
                        ->where('id', $syllabusData['id'])
                        ->update([
                            'title'       => $syllabusData['title'],
                            'description' => $syllabusData['description'] ?? '',
                        ]);
                } else {
                    $model->syllabi()->create([
                        'title'       => $syllabusData['title'],
                        'description' => $syllabusData['description'] ?? '',
                    ]);
                }
            }
        }
    }
}
