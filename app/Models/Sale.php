<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];
    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }
}
