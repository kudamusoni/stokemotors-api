<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleEdition extends Model
{
    protected $table = 'vehicle_editions';
    protected $guarded = [];

    public function models()
    {
        return $this->belongsTo(VehicleModel::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
