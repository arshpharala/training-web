<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $table = 'countries';
    protected $guarded = ["id"];

    public function states()
    {
        return $this->hasMany(State::class, 'country_id');
    }
}
