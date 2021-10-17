<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Supply;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    

	public function inventoryView(){
		
		  $allData = Inventory::get();
           // $this->data['products']=Product::where('stock_note',1)->get();
        return view('backend.invenotry.inventory_view_cat',compact('allData'));

	}
	//End method


	public function inventoryAdd(){
		$this->data['supplies'] = Supply::all();
		 return view('backend.invenotry.inventory_add_cat',$this->data);

	}
	//End method


	public function inventoryStore(Request $request){
			// return $request->all();
		$validate = $request->validate([
			'supply_id'       => 'required',
	    	'qty'             => 'required',
	    	'stock_note'      => 'required',
		]);

	 Inventory::insert([
            'supply_id'   =>$request->supply_id,
            'qty'         =>$request->qty,
            'stock_note'  =>$request->stock_note,
		 ]);
        
		  // Inventory::findOrFail($item->product_id)->decrement('product_quantity',$item->product_quantity);
    //     $item->delete();

      Toastr::success('Data Successfully Saved :)' ,'Success');
      return redirect()->route('InOutList.view');

	}
	//End method


	public function inventoryEdit(){


	}
	//End method


	public function inventoryUpdate(){


	}
	//End method


	public function inventoryDelete(){


	}
	//End method

//in out list

	public function inventoryINOut()
	{
		$this->data['allData']  = Inventory::get();
        return view('backend.invenotry.inventory_supply_in_out_cat',$this->data);
	}


}
