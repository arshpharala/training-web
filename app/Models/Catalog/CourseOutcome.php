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

    public static function store($request, $model)
    {
        $inputOutcomes = $request->input('outcomes', []);

        // Collect IDs from request
        $incomingIds = collect($inputOutcomes)->pluck('id')->filter()->toArray();

        // Delete outcomes not in request
        $model->outcomes()->whereNotIn('id', $incomingIds)->delete();

        foreach ($inputOutcomes as $outcomeData) {
            if (!empty($outcomeData['title'])) {
                if (!empty($outcomeData['id'])) {
                    // Update existing outcome
                    $model->outcomes()
                        ->where('id', $outcomeData['id'])
                        ->update([
                            'title'       => $outcomeData['title'],
                            'description' => $outcomeData['description'] ?? '',
                        ]);
                } else {
                    // Create new outcome
                    $model->outcomes()->create([
                        'title'       => $outcomeData['title'],
                        'description' => $outcomeData['description'] ?? '',
                    ]);
                }
            }
        }
    }
}
