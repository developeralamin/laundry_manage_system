@extends('admin.admin_master')
@section('content')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Laundry Supply Form
</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('supply.store') }}">
	 	@csrf

<div class="row">
	<div class="col-12">	

   <div class="row">
		<div class="col-md-6" >		
		<div class="form-group">
			<h5>Supply<span class="text-danger">*</span></h5>
			<div class="controls">
				<textarea type="text" name="supply_name"  class="form-control" ></textarea>
				
			</div>
			 
		</div>
	</div><!-- End Col Md-6 -->
    </div> <!-- End Row -->



</div> <!-- End Col M12 -->


</div> <!-- End Row -->

 
  
						 
	 <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
		<a href="{{ route('supply.view') }}" class="btn btn-rounded btn-success">Back</a>
    </div>

</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>

	  
	  </div>
  </div>


@endsection
