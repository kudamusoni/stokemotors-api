<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Filterable;

    protected $table = 'customers';

    public $timestamps = false;

    protected $guarded = [];

    public function test_drives()
    {
        return $this->hasMany(TestDrive::class);
    }
    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
    public function addresses()
    {
        return $this->belongsTo(Customer::class);
    }
}
