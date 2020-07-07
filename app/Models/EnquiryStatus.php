<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnquiryStatus extends Model
{
    protected $table = 'statuses';
    protected $guarded = [];

    public function Enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
}
