<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;


class UserController extends Controller
{
    
	public function ViewUser(){
           $this->data['users']  = User::all();

           return view('backend.users.view_user',$this->data);
	}

	//End method

	public function AddUser(){
        return view('backend.users.add_user');
	}

	//End method

	public function StoreUser(Request $request){
       
      $validata = $request->validate([
    	      'email' => 'required|unique:users',
              'name' => 'required',
          ]);
         // $data  = new User;

         $data              =  new User();
	     $code              =  rand(00000,999999);
	     $data->usertype    =  $request->usertype;
	     $data->name        =  $request->name;
	     $data->email       =  $request->email;
	     $data->password    =   bcrypt($code);
	     $data->code        = $code;
	     $data->save();

	 Toastr::success('Data Successfully Saved :)' ,'Success');
      return redirect()->route('user.view');


	}

	//End method

	public function EditUser($id){
          $this->data['editdata']  = User::findOrFail($id);

           return view('backend.users.edit_user',$this->data);
	}

	//End method

	public function UserUpdate(Request $request ,$id){
       
       User::findOrFail($id)->update([
        'name'  => $request->name , 
        'email'  => $request->email,  
        'usertype'  => $request->usertype,  
 
     ]);

          Toastr::success('Profile Successfully Update :)' ,'Success');
          return redirect()->route('user.view');

	}

	//End method

	public function UserDelete($id){
      
		$user = User::findOrFail($id);

		$user->delete();
		
        Toastr::success('Profile Successfully Update :)' ,'Success');
        return redirect()->route('user.view');


	}

	//End method



}
