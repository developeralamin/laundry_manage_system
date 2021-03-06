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
		$inventories = [];
		$inventoriesGrouped = Inventory::select(['supply_id','stock_note',DB::raw('SUM(qty) as summed')])->groupBy(['supply_id','stock_note'])->get();

		foreach($inventoriesGrouped as $inventory) {
			if (isset($inventories[$inventory->supply_id])) {
				if($inventory->stock_note == 1) {
					$inventories[$inventory->supply_id]->summed += $inventory->summed;
				} else {
					$inventories[$inventory->supply_id]->summed -= $inventory->summed;
				}
			} else {
				$inventories[$inventory->supply_id] = $inventory;
			}
		}

    $supplies = Supply::whereIn('id', collect($inventories)->pluck('supply_id'))->get()->keyBy('id');

        return view('backend.invenotry.inventory_view_cat',compact('inventories','supplies'));

	}
	//End method
	
//in out list

	public function inventoryINOut()
	{


		$this->data['allData']  = Inventory::get();
        return view('backend.invenotry.inventory_supply_in_out_cat',$this->data);
	}




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
             'created_at'       => Carbon::now(),
		 ]);
        
	

      Toastr::success('Data Successfully Saved :)' ,'Success');
      return redirect()->route('InOutList.view');

	}
	//End method


	public function inventoryEdit($id){

		 // $this->data['supplies'] = Supply::all();
		 // $this->data['editData']  = Inventory::get();
   //      return view('backend.invenotry.edit_inventory_supply_in_out_cat',$this->data);

	}
	//End method


	public function inventoryUpdate(Request $request ,$id){

	// Inventory::findOrFail($id)->update([
 //            'supply_id'   =>$request->supply_id,
 //            'qty'         =>$request->qty,
 //            'stock_note'  =>$request->stock_note,
 //             'update_at'       => Carbon::now(),
	// 	 ]);
        
	

 //      Toastr::success('Data Successfully Saved :)' ,'Success');
 //      return redirect()->route('InOutList.view');
	}
	//End method


	public function inventoryDelete($id){
      
      $delete = Inventory::findOrFail($id);
      $delete->delete();

       Toastr::success('Data Successfully Saved :)' ,'Success');
      return redirect()->route('InOutList.view');

	}
	//End method




}
