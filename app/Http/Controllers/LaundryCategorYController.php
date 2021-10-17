<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaundryCategory;
use Brian2694\Toastr\Facades\Toastr;

class LaundryCategorYController extends Controller
{
    
		public function LandryView(){
             $this->data['allData']  = LaundryCategory::all();

             return view('backend.landry_cat.view_cat',$this->data);
		}

		//End method

		public function LandryAdd(){
			return view('backend.landry_cat.add_cat');
		}

		//End method

		public function LandryStore(Request $request){
		 $validata = $request->validate([
	    	'category_name'       => 'required',
	    	'price'                => 'required',
	    	
	     ]);	

		 LaundryCategory::insert([
            'category_name' =>$request->category_name,
             'price'       =>$request->price,

		 ]);

      Toastr::success('Data Successfully Saved :)' ,'Success');
      return redirect()->route('laundry.view');

		}

		//End method

		public function LandryEdit(){

		}

		//End method

		public function LandryUpdate(){

		}

		//End method

		public function LandryDelete(){

		}

		//End method


}
