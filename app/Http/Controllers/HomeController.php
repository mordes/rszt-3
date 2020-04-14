<?php

namespace App\Http\Controllers;

use App\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Sodium\add;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $salesall = Sales::all();
        $sales = array();
        foreach ($salesall as $sale){
            $saved = new Carbon($sale->endOfAuction);
            if ($saved->gt(now())){
                array_push($sales, $sale);
            }
        }

        return view('saleslist', compact('sales'));
    }
}
