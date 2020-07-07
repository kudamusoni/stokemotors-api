<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    protected $table = 'vehicle_models';
    protected $guarded = [];

    public function makes()
    {
        return $this->belongsTo(VehicleMake::class);
    }
    public function editions()
    {
        return $this->hasMany(VehicleEdition::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
