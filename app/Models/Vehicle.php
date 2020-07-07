<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use Filterable;

    public $timestamps = false;

    protected $guarded = [];

    public function makes()
    {
        return $this->belongsTo(VehicleMake::class);
    }
    public function models()
    {
        return $this->belongsTo(VehicleModel::class);
    }
    public function editions()
    {
        return $this->belongsTo(VehicleEdition::class);
    }
    public function vehicle_images()
    {
        return $this->belongsTo(VehicleImage::class);
    }
    public function drivetrains()
    {
        return $this->belongsTo(Drivetrain::class);
    }
    public function transmissions()
    {
        return $this->belongsTo(Transmission::class);
    }
    public function state_of_vehicle()
    {
        return $this->belongsTo(VehicleState::class);
    }
    public function fuel_types()
    {
        return $this->belongsTo(FuelType::class);
    }
    public function body_styles()
    {
        return $this->belongsTo(BodyStyle::class);
    }
    public function exterior_colours()
    {
        return $this->belongsTo(ExteriorColour::class);
    }
    public function dealers()
    {
        return $this->belongsTo(Dealer::class);
    }
    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
    public function salespersons()
    {
        return $this->belongsTo(Salesperson::class);
    }
    public function test_drives()
    {
        return $this->hasMany(TestDrive::class);
    }
}
