<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryList;


class ReportsController extends Controller
{

    public function reportView()
    {
        

    	$data = LaundryList::all();
    	// dd($data);
        return view('backend.reports.reports_view',compact('data'));

    }

//End method

  public function GetreportView(Request $request)
  {
  $data = LaundryList::where('created_at','>=',$request->from)->where('created_at','<=',$request->to)->get();
  		// dd($data);

    return view('backend.reports.reports_view',compact('data'));


  }



}
