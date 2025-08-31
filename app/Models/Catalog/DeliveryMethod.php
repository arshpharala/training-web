<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class DeliveryMethod extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'shot_description',
        'icon',
        'position',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    function scopeActive($query)
    {
        $query->where('delivery_methods.is_active', 1);
    }

    function courses()
    {
        return $this->belongsToMany(Course::class, 'course_delivery_methods');
    }

    public static function sync(Request $request, $model)
    {
        $deliveryMethodIds = $request->input('delivery_methods', []);
        $model->deliveryMethods()->sync($deliveryMethodIds);
    }
}
