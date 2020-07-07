<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{

    public function listRevenue()
    {
        $rev = Sale::query()
        ->selectRaw('SUM(sale_price) as monthly_rev, MONTH(sale_date) as month_date')
        ->groupBy(DB::raw('MONTH(sale_date)'))
        ->get();
        return (['data' => $rev]);
    }
}
