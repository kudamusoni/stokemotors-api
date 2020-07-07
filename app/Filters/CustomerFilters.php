<?php
namespace App\Filters;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CustomerFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function firstname($firstname) {
        return $this->builder->where('customers.first_name', 'LIKE' , '%' . $firstname . '%');
    }

    public function lastname($lastname) {
        return $this->builder->where('customers.last_name', 'LIKE' , '%' . $lastname . '%');
    }

    public function email($email) {
        return $this->builder->where('customers.email', '=' , $email);
    }
}
