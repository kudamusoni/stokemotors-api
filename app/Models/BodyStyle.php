<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyStyle extends Model
{
    protected $table = 'body_styles';
    protected $guarded = [];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
