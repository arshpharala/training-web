<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $table = 'cities';
    protected $guarded = ["id"];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
