<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryList;
use PDF;

class ReportsController extends Controller
{

  

  public function reportView(Request $request)
  {
 
      $start_date  = $request->get('start_date', date('Y-m-d'));
      $end_date  = $request->get('end_date', date('Y-m-d'));

   $data=LaundryList::whereBetween('laundry_lists.created_at',[$start_date,$end_date])->get();
       return view('backend.reports.reports_view',compact('data','start_date','end_date'));    
  }

//End method


  public function GetreportView($laundery_id)
  {

    $this->data['laundrys'] = LaundryList::where('id',$laundery_id)->first();

	$pdf = PDF::loadView('backend.reports.reports_view_details', $this->data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');
  
  }

//End method






}
