<?php
namespace App\Save;

use App\Models\Enquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnquiryCreate
{

    protected $id;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function enquiryId($enquiryId)
    {
        $this->id = $enquiryId;
        return $this;
    }

    public function create()
    {
        return $this->save();
    }

    public function update()
    {
        return $this->save();
    }

    public function save()
    {
        $values = Enquiry::where('id', $this->id)->first();
        Enquiry::updateOrCreate(
            ['id' => $this->id],
            [
                'customer_id' => $this->request->input('customer_id') ?? $values['customer_id'],
                'vehicle_id' => $this->request->input('vehicle_id') ?? $values['vehicle_id'],
                'salesperson_id' => $this->request->input('salesperson_id') ?? $values['salesperson_id'],
                'enquiry_source_id' => $this->request->input('enquiry_source_id') ?? $values['enquiry_source_id'],
                'status_id' => $this->request->input('status_id') ?? $values['status_id'],
                'description' => $this->request->input('description') ?? $values['description'],
                'created_at' => $values['created_at'] ?? Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]
        );
    }
}
