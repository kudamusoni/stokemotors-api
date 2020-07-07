<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $guarded = [];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function dealers()
    {
        return $this->belongsTo(Dealer::class);
    }
}
