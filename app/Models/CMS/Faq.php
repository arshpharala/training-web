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
        $inputFaqs = $request->input('faqs', []);

        // Collect IDs coming from the request
        $incomingIds = collect($inputFaqs)->pluck('id')->filter()->toArray();

        // Delete FAQs not present in request
        $model->faqs()->whereNotIn('id', $incomingIds)->delete();

        foreach ($inputFaqs as $index => $faqData) {
            if (!empty($faqData['question'])) {
                if (!empty($faqData['id'])) {
                    // Update existing FAQ
                    $model->faqs()
                        ->where('id', $faqData['id'])
                        ->update([
                            'question' => $faqData['question'],
                            'answer'   => $faqData['answer'] ?? null,
                            'position' => $faqData['position'] ?? $index,
                        ]);
                } else {
                    // Create new FAQ
                    $model->faqs()->create([
                        'question' => $faqData['question'],
                        'answer'   => $faqData['answer'] ?? null,
                        'position' => $faqData['position'] ?? $index,
                    ]);
                }
            }
        }
    }
}
