<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleState extends Model
{
    protected $table = 'state_of_vehicles';
    protected $guarded = [];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
