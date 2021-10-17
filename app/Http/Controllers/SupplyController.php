<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supply;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;



class SupplyController extends Controller
{
	    
	public function SupplyView(){
		$this->data['allData'] = Supply::all();
		return view('backend.laundry_supply.view_landry_supply',$this->data);
	}

	//End method


	public function SupplyAdd(){
		return view('backend.laundry_supply.add_landry_supply');
	}

	//End method


	public function SupplyStore(Request $request){
		 $validata = $request->validate([
	    	'supply_name'       => 'required',
	    
	    	
	     ]);	

		 Supply::insert([
            'supply_name' =>$request->supply_name,
            'created_at' =>Carbon::now(),

		 ]);

      Toastr::success('Data Successfully Saved :)' ,'Success');
      return redirect()->route('supply.view');
	}

	//End method


	public function SupplyEdit($id){
        $this->data['editData']  = Supply::findOrFail($id);
        return view('backend.laundry_supply.edit_landry_supply',$this->data);
	}

	//End method


	public function SupplyUpdate(Request $request ,$id){
         
         Supply::findOrFail($id)->update([

         	 'supply_name' =>$request->supply_name,
             'created_at' =>Carbon::now(),
         ]);
     Toastr::success('Data Successfully Update :)' ,'Success');
      return redirect()->route('supply.view');


	}

	//End method


	public function SupplyDelete($id){
		$supply = Supply::findOrFail($id);
		$supply->delete();

	 Toastr::success('Data Successfully Delete :)' ,'Success');
      return redirect()->route('supply.view');

	}

	//End method





}
