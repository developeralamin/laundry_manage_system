@extends('admin.admin_master')
@section('content')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

    <section class="content">

		               
<div class="container col-12  align-center">

              


  

  <div class="row">
    <div class="col-12">  

    <div class="row"> {{-- /// 1st row --}}

    <div class="col-md-6" >   

         <h3 class="widget-user-username">User Name : {{ $user->name }}</h3>
     
    <h6 class="widget-user-desc">User Type : {{ $user->usertype }}</h6>
    <h6 class="widget-user-desc">User Email : {{ $user->email }}</h6>


     </div>

    


    <div class="col-md-6" >   
        <div class="form-group">
         
         <h6 class="widget-user-desc">Address : {{ $user->address }}</h6>

        </div>
     </div>

     <div class="col-md-6" >   
        <div class="form-group">
         
         <h6 class="widget-user-desc">Gender : {{ $user->gender }}</h6>

        </div>
     </div>

</div> {{-- /// End 1st row --}}

    <div class="row"> {{-- /// 2nd row --}}
    <div class="col-md-6" >   
        <div class="form-group">
         
         <h6 class="widget-user-desc">Mobile : {{ $user->mobile }}</h6>

        </div>
     </div>

</div> {{-- /// End 2nd row --}}
<div class="col-md-6" >   
         <div class="widget-user-image">
    <img class="rounded-circle"
     src="{{ (!empty($user->profile))? url('uploads/profile/'.$user->profile):url('uploads/no_image.jpg') }}" alt="User Avatar">
  </div>
     </div>

</div> {{-- /// End 3rd row --}}


</div>
  <a href="{{ route('profile.edit') }}" class="btn btn-rounded btn-success "> Edit Profile</a>
</div>

	</section>

	  
	  </div>
  </div>


@endsection
