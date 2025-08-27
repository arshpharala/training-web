<?php

namespace App\Models\CMS;

use App\Models\CMS\PageTranslation;
use App\Trait\HasMeta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory, HasUuids, SoftDeletes, HasMeta;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['slug', 'is_active', 'position', 'banner'];

    function scopeActive($query){
        $query->where('is_active', 1);
    }

    function scopeFindBySlug($query, $slug){
        $query->where('slug', $slug);
    }

    public function translation()
    {
        return $this->hasOne(PageTranslation::class)->where('locale', app()->getLocale());
    }

    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }

    public function sections()
    {
        return $this->hasMany(PageSection::class);
    }
}
