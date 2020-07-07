<?php
namespace App\Filters;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EnquiryFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function customer_id($customerId) {
        return $this->builder->where('enquiries.customer_id', '=', $customerId);
    }

    public function vehicle_id($vehicleId) {
        return $this->builder->where('enquiries.vehicle_id', '=', $vehicleId);
    }

    public function salesperson_id($salespersonId) {
        return $this->builder->where('enquiries.salesperson_id', '=', $salespersonId);
    }

    public function enquiry_source($enquirySourceId) {
        return $this->builder->where('enquiries.enquiry_source_id', '=', $enquirySourceId);
    }

    public function status($statusId) {
        return $this->builder->where('enquiries.status_id', '=', $statusId);
    }
}
