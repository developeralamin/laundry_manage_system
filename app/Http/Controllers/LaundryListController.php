<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryCategory;
use App\Models\LaundryList;
use App\Models\LaundryItem;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;


class LaundryListController extends Controller
{
  

		public function LandryListView(){
             $this->data['allData']  = LaundryList::simplePaginate(3);

            return view('backend.laundry_list.view_landry_list',$this->data);
		}

		//End mehtod


		public function LandryListAdd(){
			$this->data['laundry_categorys'] = LaundryCategory::all();

			return view('backend.laundry_list.add_landry_list',$this->data);

		}

		//End mehtod


		public function LandryListStore(Request $request){

    	$laundry_id            = LaundryList::insertGetId([
            'customer_name'    => $request->customer_name,
            'remarks'          => $request->remarks,
            'status'           => $request->status,
            'total_amount'     => $request->total_amount,
            'amount_change'    => $request->amount_change,
            'created_at'       => Carbon::now(),
    	]);

    	 LaundryItem::insertGetId([
    		'laundry_id'             => $laundry_id,
    		'laundry_category_id'    => $request->laundry_category_id,
    		'weight'                 => $request->weight,
    		'unit_price'             => $request->unit_price,
    		'amount'                 => $request->amount,
             'created_at'            => Carbon::now(),
    	]);


      Toastr::success('Data Successfully Saved :)' ,'Success');
      return redirect()->route('laundryList.view');


		}

		//End mehtod


		public function LandryListEdit($id){
         $this->data['editData']             = LaundryList::findOrFail($id);
         $this->data['editData2']             = LaundryItem::findOrFail($id);
         $this->data['laundry_categorys']    = LaundryCategory::all();
          return view('backend.laundry_list.edit_landry_list',$this->data);
		}

		//End mehtod


		public function LandryListUpdate(Request $request ,$id){

         $laundry_id            = LaundryList::findOrFail($id)->update([
            'customer_name'    => $request->customer_name,
            'remarks'          => $request->remarks,
            'status'           => $request->status,
            'total_amount'     => $request->total_amount,
            'amount_change'    => $request->amount_change,
            'created_at'       => Carbon::now(),
    	]);

    	LaundryItem::findOrFail($id)->update([
    		'laundry_id'             => $laundry_id,
    		'laundry_category_id'    => $request->laundry_category_id,
    		'weight'                 => $request->weight,
    		'unit_price'             => $request->unit_price,
    		'amount'                 => $request->amount,
             'created_at'            => Carbon::now(),
    	]);


      Toastr::success('Data Successfully Saved :)' ,'Success');
      return redirect()->route('laundryList.view');



		}

		//End mehtod


		public function LandryListDelete($laundry_id){

		$laundry_delete = LaundryList::findOrFail($laundry_id);
		// $laundry_deletedf = LaundryItem::findOrFail($id);
		//  LaundryList::where('id',$laundry_id)->delete();
		$laundry_delete->delete();

  //     DB::table('laundry_lists')


// DB::table("laundry_lists")->where("laundry_id", $id)->delete();
// DB::table("laundry_items")->where("laundry_id", $laundry_id)->delete();


		 Toastr::success('Data Successfully Delete :)' ,'Success');
         return redirect()->route('laundryList.view');	



		}


  //useing jQuery select laundry price here

	  public function findPrice(Request $request)
	  {
	  		  
	  	$category = LaundryCategory::whereId($request->id)->first();
	  	return $category;
	  }


}
