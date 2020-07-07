<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleMake extends Model
{
    protected $table = 'vehicle_makes';
    protected $guarded = [];

    public function models()
    {
        return $this->hasMany(VehicleModel::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicles::class);
    }
}
