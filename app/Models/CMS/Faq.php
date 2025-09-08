<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'position',
    ];

    public function faqable()
    {
        return $this->morphTo();
    }

    public static function store($request, $model)
    {
        $model->faqs()->delete(); // reset old FAQs to simplify sync

        foreach ($request->input('faqs', []) as $index => $faqData) {
            if (!empty($faqData['question'])) {
                $model->faqs()->create([
                    'question' => $faqData['question'],
                    'answer'   => $faqData['answer'] ?? null,
                    'position' => $faqData['position'] ?? $index,
                ]);
            }
        }
    }
}
