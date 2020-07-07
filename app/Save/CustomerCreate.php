<?php
namespace App\Save;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerCreate
{
    protected $id;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function customerId($customerId)
    {
        $this->id = $customerId;
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
        $values = Customer::where('id', $this->id)->first();
        Customer::updateOrCreate(
            ['id' => $this->id],
            [
                'first_name' =>   $this->request->input('first_name') ?? $values['first_name'],
                'last_name' =>   $this->request->input('last_name') ?? $values['last_name'],
                'date_of_birth' =>   $this->request->input('date_of_birth') ?? $values['date_of_birth'],
                'email' =>   $this->request->input('email') ?? $values['email'],
                'phone_number' =>   $this->request->input('phone_number') ?? $values['phone_number']
            ]
        );
    }
}
