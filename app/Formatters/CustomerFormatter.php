<?php
namespace App\Formatters;

use App\Models\Address;
use App\Models\Customer;

class CustomerFormatter
{
    protected $vehicle;

    public function getCustomer($id)
    {
        $this->customer = Customer::where('id', $id)->first();
        return $this->formatter();
    }

    protected function formatter()
    {
        return ([
            'first_name' => $this->customer->first_name,
            'last_name' => $this->customer->last_name,
            'date_of_birth' => $this->customer->date_of_birth,
            'email' => $this->customer->email,
            'phone_number' => $this->customer->phone_number,
            'address' => $this->addresses($this->customer->id),
            'number_of_enquiries' => $this->customer->num_of_enquiry,
            'archive' => $this->customer->archive
        ]);
    }

    protected function addresses($id)
    {
        $address = Address::where('id', $id)->first();
        return ([
            'id' => $address['id'],
            'line_1' => $address['line_1'],
            'line_2' => $address['line_2'],
            'line_3' => $address['line_3'],
            'city' => $address['city'],
            'region' => $address['region'],
            'country' => $address['country'],
            'postal_code' => $address['postal_code'],
            'latitude' => $address['latitude'],
            'longitude' => $address['longitude'],
            'archive' => $address['archive']
        ]);
    }
}
