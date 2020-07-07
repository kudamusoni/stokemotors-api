<?php

namespace App\Http\Controllers;

use App\Filters\VehicleFilters;
use App\Formatters\VehicleFormatter;
use App\Models\Vehicle;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Save\VehicleCreate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    protected $formatter;
    protected $request;
    protected $vehicle;

    public function __construct(VehicleFormatter $formatter, Request $request, Vehicle $vehicle, VehicleCreate $create)
    {
        $this->formatter = $formatter;
        $this->request = $request;
        $this->vehicle = $vehicle;
        $this->save = $create;
    }

    public function create()
    {
        $validator = Validator::make($this->request->all(),[
            'make_id' => 'required|integer',
            'model_id' => 'required|integer'
        ]);
        if($validator->fails()) {
            return response($validator->messages(), 422);
        }
        try{
            $this->save->create($this->request);
            return(['data' => 'Your vehicle has been created']);
        } catch (Exception $e) {
            return Response(['error' => $e->getMessage()],422);
        }
    }

    public function listVehicles(Request $request, VehicleFilters $filters)
    {
        $vehicles = Vehicle::filter($filters)->where('archive', 0)->where('purchased', 0)->paginate(12)->appends($request->all());
        $vehicles->links();
        $vehicles->getCollection()->transform(function($val){
            return $this->formatter->getVehicle($val->id)->vehicleFormat();
        });
        return view('vehicle')->with('vehicles', $vehicles);
        // return $vehicles;
    }

    public function listMakes(){
        $makes = VehicleMake::paginate(10);
        return (['data' => $makes]);
    }

    public function listModels($makeId)
    {
        $models = VehicleModel::query()
        ->join('vehicle_makes', 'vehicle_models.make_id', '=', 'vehicle_makes.id')
        ->select('vehicle_models.make_id', 'vehicle_makes.name as makeName','vehicle_models.id as modelId', 'vehicle_models.name as modelName')
        ->where('vehicle_models.make_id',$makeId)
        ->get();
        return(['data' => $models]);
    }

    public function listEditions($modelId)
    {
        return Vehicle::query()
        ->join('vehicle_makes', 'vehicles.make_id', '=', 'vehicle_makes.id')
        ->join('vehicle_models', 'vehicles.model_id', '=', 'vehicle_models.id')
        ->join('vehicle_editions', 'vehicles.edition_id', '=', 'vehicle_editions.id')
        ->select('vehicle_makes.name as make', 'vehicle_models.name as model', 'vehicle_editions.name as edition')
        ->where('vehicle_editions.model_id', $modelId)
        ->get();
    }

    public function vehicleDetails($vehicleId)
    {
        return $this->formatter->getVehicle($vehicleId)->vehicleFormat();
    }

    public function update($vehicleId)
    {
        try {
            $this->save->setVehicle($vehicleId)->update($this->request);
            return(['data' => 'Your vehicle has been updated']);
        } catch (Exception $e) {
            return Response(['error' => $e->getMessage()],422);
        }
    }

    public function delete($vehicleId)
    {
        Vehicle::query()->where('id', $vehicleId)->update(['archive' => 1]);
        return(['data' => 'Your vehicle has been archived']);
    }
}
