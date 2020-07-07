<?php
namespace App\Formatters;

use App\Models\BodyStyle;
use App\Models\Dealer;
use App\Models\Drivetrain;
use App\Models\ExteriorColour;
use App\Models\FuelType;
use App\Models\Transmission;
use App\Models\Vehicle;
use App\Models\VehicleEdition;
use App\Models\VehicleImage;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\VehicleState;

class VehicleFormatter
{
    protected $vehicle;

    public function getVehicle($id)
    {
        $this->vehicle = Vehicle::where('id', $id)->first();
        return $this;
    }

    public function imageFormat()
    {
        $images = VehicleImage::where('vehicle_id', $this->vehicle->id)->first();
        return ([
            'id' => $images->id,
            'vehicle_id' => [
                $this->make($this->vehicle->make_id),
                $this->model($this->vehicle->model_id),
                $this->edition($this->vehicle->edition_id),
            ],
            'url' => $images->url,
            'image_order' => $images->image_order,
            'archive' => $images->archive
        ]);
    }

    public function vehicleFormat()
    {
        return ([
            'id' => $this->vehicle->id,
            'dealer' => $this->dealer($this->vehicle->dealer_id),
            'make' => $this->make($this->vehicle->make_id),
            'model' => $this->model($this->vehicle->model_id),
            'edition' => $this->edition($this->vehicle->edition_id),
            'registration' => $this->vehicle->registration,
            'year' => $this->vehicle->year,
            'transmission' => $this->transmission($this->vehicle->transmission_id),
            'body_style' => $this->body_style($this->vehicle->body_style_id),
            'fuel_type' => $this->fuel_type($this->vehicle->fuel_type_id),
            'exterior_colour' => $this->exterior_colour($this->vehicle->exterior_colour_id),
            'state_of_vehicle' => $this->state_of_vehicle($this->vehicle->state_of_vehicle_id),
            'drivetrain' => $this->drivetrain($this->vehicle->drivetrain_id),
            'price' => $this->vehicle->price,
            'vin' => $this->vehicle->vin,
            'mileage' => $this->vehicle->mileage,
            'number_of_doors' => $this->vehicle->number_of_doors,
            'added_to_stock' => $this->vehicle->added_to_stock,
            'description' => $this->vehicle->description,
            'archive' => $this->vehicle->archive,
            'purchased' => $this->vehicle->purchased,
            'main_image' => $this->imageFormat()
        ]);
    }

    protected function dealer($id)
    {
        $dealer = Dealer::where('id', $id)->first();
        return ([
            'id' => $dealer->id,
            'name' => $dealer->name
        ]);
    }

    protected function make($id)
    {
        $make = VehicleMake::where('id', $id)->first();
        return ([
            'id' => $make->id,
            'name' => $make->name
        ]);
    }

    protected function model($id)
    {
        $model = VehicleModel::where('id', $id)->first();
        return ([
            'id' => $model->id,
            'name' => $model->name
        ]);
    }

    protected function edition($id)
    {
        $edition = VehicleEdition::where('id', $id)->first();
        return ([
            'id' => $edition->id,
            'name' => $edition->name
        ]);
    }

    protected function transmission($id)
    {
        $transmission = Transmission::where('id', $id)->first();
        return ([
            'id' => $transmission->id,
            'name' => $transmission->name
        ]);
    }

    protected function body_style($id)
    {
        $body_style = BodyStyle::where('id', $id)->first();
        return ([
            'id' => $body_style->id,
            'name' => $body_style->name
        ]);
    }

    protected function fuel_type($id)
    {
        $fuel_type = FuelType::where('id', $id)->first();
        return ([
            'id' => $fuel_type->id,
            'name' => $fuel_type->name
        ]);
    }

    protected function exterior_colour($id)
    {
        $exterior_colour = ExteriorColour::where('id', $id)->first();
        return ([
            'id' => $exterior_colour->id,
            'name' => $exterior_colour->name
        ]);
    }

    protected function state_of_vehicle($id)
    {
        $state_of_vehicle = VehicleState::where('id', $id)->first();
        return ([
            'id' => $state_of_vehicle->id,
            'name' => $state_of_vehicle->name
        ]);
    }

    protected function drivetrain($id)
    {
        $drivetrain = Drivetrain::where('id', $id)->first();
        return ([
            'id' => $drivetrain->id,
            'name' => $drivetrain->name
        ]);
    }
}
