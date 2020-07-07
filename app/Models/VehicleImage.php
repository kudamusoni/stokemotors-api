<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $table = 'vehicle_images';
    public $timestamps = false;
    protected $guarded = [];

    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
