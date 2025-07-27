<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class DeliveryMethod extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

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
