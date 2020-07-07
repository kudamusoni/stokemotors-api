<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use Filterable;
    protected $table = 'enquiries';
    protected $guarded = [];

    public function enquiry_sources()
    {
        return $this->belongsTo(EnquirySource::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function salespersons()
    {
        return $this->belongsTo(Salesperson::class);
    }
    public function vehicles()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
