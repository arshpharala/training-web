<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'image',
        'company_logo',
        'company_name',
        'designation',
        'is_active',
        'position',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    function scopeActive($query){
        $query->where('testimonials.is_active', 1);
    }

    public function translations()
    {
        return $this->hasMany(TestimonialTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(TestimonialTranslation::class)->where('locale', app()->getLocale());
    }
}
