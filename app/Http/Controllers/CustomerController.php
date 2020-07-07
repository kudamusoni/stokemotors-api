<?php
namespace App\Http\Controllers;

use App\Filters\CustomerFilters;
use App\Formatters\CustomerFormatter;
use App\Save\CustomerCreate;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    protected $create;
    protected $request;
    protected $formatter;

    public function __construct(CustomerCreate $create, Request $request, CustomerFormatter $formatter)
    {
        $this->customer = $create;
        $this->request = $request;
        $this->formatter = $formatter;
    }

    public function listCustomers(CustomerFilters $filters)
    {
        $customers = Customer::filter($filters)->where('archive', 0)->paginate(12)->appends($this->request->all());
        $customers->links();
        $customers->getCollection()->transform(function($val){
            return $this->formatter->getCustomer($val->id);
        });
        return $customers;
    }

    public function create()
    {
        $validator = Validator::make($this->request->all(),[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
        ]);

        if($validator->fails()){
            return response($validator->messages(), 422);
        }
        try {
            $this->customer->create();
            return(['data' => 'Your customer has been created']);
        } catch (Exception $e) {
            return Response(['error' => $e->getMessage()],422);
        }
    }

    public function update($customerId)
    {
        $validator = IlluminateValidator::make($this->request->all(),[
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'date_of_birth' => 'date',
            'email' => 'email',
            'phone_numbers' => 'max:15'
        ]);

        if($validator->fails()){
            return response($validator->messages(), 422);
        }
        try {
            $this->customer->customerId($customerId)->update();
            return(['data' => 'Your customer has been updated']);
        } catch (Exception $e) {
            return Response(['error' => $e->getMessage()],422);
        }
    }

}
