<?php

namespace App\Save;

use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;


class VehicleCreate
{
    protected $request;
    protected $vehicle;
    protected $id;

    public function __construct(Request $request, Vehicle $vehicle)
    {
        $this->request = $request;
        $this->vehicle = $vehicle;
    }

    public function setVehicle($vehicleId)
    {
        $this->id = $vehicleId;
        return $this;
    }

    public function create()
    {
        if($this->request->input('id')){
            return false;
        }
        return $this->save();
    }

    public function update()
    {
        return $this->save();
    }

    public function save()
    {
        $values = Vehicle::where('id', $this->id)->first();
        Vehicle::updateOrCreate(
            ['id' => $this->id],
            [
                'dealer_id' =>  1,
                'make_id' => $this->request->input('make_id') ?? $values['make_id'],
                'model_id' => $this->request->input('model_id') ?? $values['model_id'],
                'edition_id' => $this->request->input('edition_id') ?? $values['edition_id'],
                'registration' => $this->request->input('registration') ?? $values['registration'],
                'year' => $this->request->input('year') ?? $values['year'],
                'transmission_id' => $this->request->input('transmission_id') ?? $values['transmission_id'],
                'body_style_id' => $this->request->input('body_style_id') ?? $values['body_style_id'],
                'fuel_type_id' => $this->request->input('fuel_type_id') ?? $values['fuel_type_id'],
                'exterior_colour_id' => $this->request->input('exterior_colour_id') ?? $values['exterior_colour_id'],
                'state_of_vehicle_id' => $this->request->input('state_of_vehicle_id') ?? $values['state_of_vehicle_id'],
                'drivetrain_id' => $this->request->input('drivetrain_id') ?? $values['drivetrain_id'],
                'price' => $this->request->input('price') ?? $values['price'],
                'vin' => $this->request->input('vin') ?? $values['vin'],
                'mileage' => $this->request->input('mileage') ?? $values['mileage'],
                'number_of_doors' => $this->request->input('number_of_doors') ?? $values['number_of_doors'],
                'added_to_stock' => Carbon::now()->toDateString() ?? $values['added_to_stock'],
                'description' => $this->request->input('description') ?? $values['description'],
                'archive' => $this->request->input('archive')  ?? $values['archive'],
                'purchased' => $this->request->input('purchased') ?? $values['purchased'],
            ]
        );
    }
}
