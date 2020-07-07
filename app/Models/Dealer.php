<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
