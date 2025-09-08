<?php

namespace App\Trait;

use App\Models\CMS\Faq;

trait HasFaqs
{
    public function faqs()
    {
        return $this->morphMany(Faq::class, 'faqable')->orderBy('position');
    }
}
