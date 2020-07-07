<?php

namespace App\Traits;

use App\Models\Vehicle;

trait VehicleTrait
{
    public function getBasicVehicleInfo($vehicleId){
        return Vehicle::query()
        ->join('vehicle_makes', 'vehicles.make_id', '=', 'vehicle_makes.id')
        ->join('vehicle_models', 'vehicles.model_id', '=', 'vehicle_models.id')
        ->join('vehicle_editions', 'vehicles.edition_id', '=', 'vehicle_editions.id')
        ->select('vehicle_makes.name as make', 'vehicle_models.name as model', 'vehicle_editions.name as edition')
        ->where('vehicles.id', $vehicleId)
        ->first();
    }

}
