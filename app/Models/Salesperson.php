<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salesperson extends Model
{
    protected $table = "salespersons";
    protected $guarded = [];
    public function test_drives()
    {
        return $this->hasMany(TestDrive::class);
    }
    public function enquiries()
    {
        return $this->hasMany(Enquiries::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
