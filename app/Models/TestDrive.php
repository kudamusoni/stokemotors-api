<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestDrive extends Model
{
    protected $table = 'test_drives';
    protected $guarded = [];

    public function models()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function salespersons()
    {
        return $this->belongsTo(Salesperson::class);
    }
    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
}
