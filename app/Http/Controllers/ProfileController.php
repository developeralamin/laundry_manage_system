<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
  

		public function ViewProfile(){

            $id = Auth::user()->id;
            $user = User::find($id);
           //  echo "<pre>";
           // var_dump($id);
      
            return view('backend.users.view_profile',compact('user'));

		}

		//End method


		public function EditProfile(){
				      $id          = Auth::user()->id;
    	             $editData     = User::find($id);
    	return view('backend.users.edit_profile',compact('editData'));
		}

		//End method


		public function StoreProfile(Request $request){


            $data = User::find(Auth::user()->id);
              
        if($request->hasfile('profile')){
        	$Image = $request->file('profile');
        	 $ext = time().'.'.$Image->getClientOriginalExtension();
		     Image::make($Image)->resize(600, 622)->save(public_path('/uploads/profile/'.$ext)); 
        }


            $data->name       = $request->name;
            $data->gender     = $request->gender;
            $data->email      = $request->email;
            $data->mobile     = $request->mobile;
            $data->address    = $request->address;
            $data->profile    = $ext;


            $data->save();


        Toastr::success('Data Successfully Saved :)' ,'Success');
        return redirect()->route('profile.view');

		}

		//End method


		public function PasswordView(){
			return view('backend.users.edit_password');		
		}

		//End method


		public function PasswordUpdate(Request $request){
		$validata = $request->validate([
	    	'oldpassword'  => 'required',
	        'password'     => 'required|confirmed',
	     ]);

      $haspassword = Auth::user()->password;

     if(Hash::check($request->oldpassword,$haspassword)){
      	  $user = User::find(Auth::id());
      	  $user->password = Hash::make($request->password);
      	  $user->save();
      	  Auth::logout();
     	  return redirect()->route('login');
      }else{
      	return redirect()->back();
      }
      
}

		//End method





}
