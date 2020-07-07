<?php
namespace App\Filters;
use Illuminate\Http\Request;
use Carbon\Carbon;
class VehicleFilters extends QueryFilters
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function make($makeId) {
        return $this->builder->where('vehicles.make_id', '=', $makeId);
    }

    public function model($modelId) {
        return $this->builder->where('vehicles.model_id', '=', $modelId);
    }

    public function edition($editionId) {
        return $this->builder->where('vehicles.edition_id', '=', $editionId);
    }

    public function page($page) {
        return $this->builder->paginate($page);
    }

    public function price($price) {
        return $this->builder->where('vehicles.price', '=', $price);
    }
}
