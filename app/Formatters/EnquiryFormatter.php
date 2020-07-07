<?php

namespace App\Formatters;

use App\Models\Customer;
use App\Models\Enquiry;
use App\Models\EnquirySource;
use App\Models\EnquiryStatus;
use App\Models\Salesperson;
use App\Models\Vehicle;
use App\Traits\VehicleTrait;
use Carbon\Carbon;

class EnquiryFormatter {

    use VehicleTrait;

    protected $enquiry;

    public function getEnquiry($enquiryId)
    {
        $this->enquiry = Enquiry::where('id', $enquiryId)->first();
        return $this->formatter();
    }

    protected function formatter()
    {
        return ([
            'id' => $this->enquiry->id,
            'customer' => $this->customer($this->enquiry->customer_id),
            'vehicle' => $this->vehicle($this->enquiry->vehicle_id),
            'salesperson' => $this->salesperson($this->enquiry->salesperson_id),
            'enquiry_source' => $this->enquiry_source($this->enquiry->enquiry_source_id),
            'status' => $this->status($this->enquiry->status_id),
            'description' => $this->enquiry->description,
            'created_at' => Carbon::parse($this->enquiry->created_at)->toDateTimeString(),
            'updated_at' => Carbon::parse($this->enquiry->updated_at)->toDateTimeString(),
            'archive' => $this->enquiry->archive,
       ]);
    }

    protected function customer($id)
    {
        $customer = Customer::where('id', $id)->first();
        return ([
            'id' => $customer->id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name
        ]);
    }

    protected function vehicle($id)
    {
        $vehicle = $this->getBasicVehicleInfo($id);
        return ([
            'id' => $id,
            'make' => $vehicle->make,
            'model' => $vehicle->model,
            'edition' => $vehicle->edition
        ]);
    }

    protected function salesperson($id)
    {
        $salesperson = Salesperson::where('id', $id)->first();
        return ([
            'id' => $salesperson->id,
            'first_name' => $salesperson->first_name,
            'last_name' => $salesperson->last_name,
        ]);
    }

    protected function enquiry_source($id)
    {
        $source = EnquirySource::where('id', $id)->first();
        return ([
            'id' => $source->id,
            'name' => $source->name,
            'image' => $source->image
        ]);
    }

    protected function status($id)
    {
        $status = EnquiryStatus::where('id', $id)->first();
        return ([
            'id' => $status->id,
            'name' => $status->name,
        ]);
    }
}
