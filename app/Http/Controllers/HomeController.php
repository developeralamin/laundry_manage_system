<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryList;


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
        $totalProfitToday = LaundryList::whereDate('created_at', today())->sum('total_amount');

        $totalcustomer = LaundryList::whereDate('created_at', today())->count('id');

        $totalClaimedcustomer = LaundryList::where('status',3)->whereDate('created_at', today())->count();

        return view('admin.index',compact('totalProfitToday','totalcustomer','totalClaimedcustomer'));
    }
}
