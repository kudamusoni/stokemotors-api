<?php
namespace App\Http\Controllers;

use App\Formatters\VehicleFormatter;
use App\Models\VehicleImage;
use App\Save\VehicleImageCreate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as IlluminateValidator;
use Illuminate\Validation\Validator;

class VehicleImageController extends Controller
{
    protected $formatter;
    protected $create;

    public function __construct(VehicleFormatter $formatter, VehicleImageCreate $create)
    {
        $this->formatter = $formatter;
        $this->image = $create;
    }

    public function listImages($vehicleId)
    {
        $images = VehicleImage::where('vehicle_id',$vehicleId)->paginate(12);
        $images->links();
        $images->getCollection()->transform(function($val){
            return $this->formatter->getVehicle($val->vehicle_id)->imageFormat();
        });
        return $images;
    }

    public function create($vehicleId, Request $request)
    {
        $validator = IlluminateValidator::make($request->all(),[
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails()){
            return response($validator->messages(), 422);
        }
        try {
            $this->image->setVehicleId($vehicleId)->save();
            return (['data' => 'Your image(s) have been saved']);
        } catch (Exception $e) {
            return Response(['error' => $e->getMessage()],422);
        }
    }
}
