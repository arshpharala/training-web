<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PageSection extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'page_id',
        'type',
        'image',
        'settings',
        'position',
        'is_active',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function translations()
    {
        return $this->hasMany(PageSectionTranslation::class);
    }


    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
