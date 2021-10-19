<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryCategory;
use App\Models\LaundryList;
use App\Models\LaundryItem;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

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
            'status'          => $request->status,
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


		public function LandryListEdit(){

		}

		//End mehtod


		public function LandryListUpdate(){

		}

		//End mehtod


		public function LandryListDelete(){

		}


public function findProductName(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        // $data=LaundryItem::select('productname','id')->where('prod_cat_id',$request->id)->take(100)->get();
        // return response()->json($data);//then sent this data to ajax success
	}


		//End mehtod

	  public function findPrice(Request $request)
	  {
	  		  
	  	$category = LaundryCategory::whereId($request->id)->first();
	  	return $category;
	  }


}
