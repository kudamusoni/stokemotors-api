<?php

namespace App\Http\Controllers;

use App\Filters\EnquiryFilters;
use App\Formatters\EnquiryFormatter;
use App\Models\Enquiry;
use App\Models\Sale;
use App\Models\Vehicle;
use App\Save\EnquiryCreate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{

    protected $request;
    protected $formatter;
    protected $enquiry;

    public function __construct(Request $request, EnquiryFormatter $formatter, EnquiryCreate $create)
    {
        $this->request = $request;
        $this->formatter = $formatter;
        $this->enquiry = $create;
    }

    public function listEnquiries(EnquiryFilters $filters)
    {
        $enquiries = Enquiry::filter($filters)->where('archive', 0)->paginate(12)->appends($this->request->all());
        $enquiries->links();
        $enquiries->getCollection()->transform(function ($val) {
            return $this->formatter->getEnquiry($val->id);
        });

        return view('enquiry')->with(['enquiries' => $enquiries]);
    }

    public function create()
    {
        $validator = validator::make($this->request->all(),[
            'customer_id' => 'required|integer',
            'vehicle_id' => 'required|integer',
            'salesperson_id' => 'required|integer',
        ]);

        if($validator->fails()){
            return response($validator->messages(), 422);
        }

        try{
            $this->enquiry->create();
            return(['data' => 'Your Enquiry has been created']);
        } catch (Exception $e) {
            return Response(['error' => $e->getMessage()],422);
        }
    }

    public function update($enquiryId)
    {
        $enquiry = Enquiry::query()->where('id', $enquiryId)->first();

        if ($enquiry['status_id'] == 3 || $enquiry['archive'] == 1) {
            return(['error' => 'The enquiry has either been archived or the vehicle has been bought']);
        }
        $this->enquiry->enquiryId($enquiryId)->update();

        $this->vehicleSold($enquiryId);

        return(['data' => 'Your Enquiry has been updated']);
    }

    public function delete($enquiryId)
    {
        $validator = Validator::make($enquiryId,[
            'id' => 'required|integer',
        ]);
        if($validator->fails()){
            return response($validator->messages(), 200);
        }
        Enquiry::query()->where('id', $enquiryId)->update(['archive' => 1]);
        return(['data' => 'Your enquiry has been archived']);
    }

    public function vehicleSold($id)
    {
        $enquiry = Enquiry::query()->where('id', $id)->first();
        $sale = Sale::query()->where('enquiry_id', $id)->first();
        if($enquiry->status_id !== 3 || $sale){
            return;
        }
        $vehicle = Vehicle::query()->where('id', $enquiry->vehicle_id)->first();
        $sale = new Sale;
        $sale->enquiry_id = $id;
        $sale->sale_date = Carbon::now()->toDateTimeString();
        $sale->created_at = Carbon::now()->toDateTimeString();
        $sale->updated_at = Carbon::now()->toDateTimeString();
        $sale->sale_price = $vehicle->price;
        $sale->save();
        $this->setPurchased($vehicle->id);

    }

    protected function setPurchased($id)
    {
        $vehicle = Vehicle::query()->where('id', $id)->first();
        $vehicle->purchased = 1;
        $vehicle->save();
    }

    public function getMessages()
    {
        $http = new Client(['base_uri' => '']);
        $request = $http->request('GET', '');
        dd($request);
    }
}
