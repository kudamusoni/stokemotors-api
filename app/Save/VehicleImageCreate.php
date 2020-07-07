<?php
namespace App\Save;

use App\Models\VehicleImage;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class VehicleImageCreate
{
    protected $store;
    protected $request;
    protected $id;
    protected $extension;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->configure();
    }

    protected function configure(){
        $this->store = new ImageManager(array('driver' =>  'gd'));
    }

    protected function getExtension()
    {
        $imgExt = explode('.', $this->request->images->getClientOriginalName());
        $this->extension = end($imgExt);
        return $this;
    }

    public function setVehicleId($vehicleId)
    {
        $this->id = $vehicleId;
        return $this;
    }

    public function save()
    {
        for ($i=0; $i < count($this->request->images); $i++) {
            $this->store->make($this->request->images[$i])->save($this->request->images[$i]->getClientOriginalName() . $this->extension);
            $image = new VehicleImage();
            $image->vehicle_id = $this->id;
            $image->url = 'http://local.stokemotors.uk/images/' . md5(uniqid() . time()) . '.' . $this->extension;
            $image->save();
        }
    }
}
