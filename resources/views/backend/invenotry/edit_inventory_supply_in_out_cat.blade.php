
@extends('admin.admin_master')
@section('content')

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">

<div class="col-lg-10">
				<div class="card">
					<div class="card-header">
						Manage Supply
						{{-- \Supply In/Out List --}}
						{{-- <button class="btn btn-primary  float-right" id="manage-supply">Manage Supply</button> --}}
					</div>
				
 <form method="post" action="{{ route('inventory.store') }}">
	 	@csrf

	<div class="col-12">	

   <div class="row">

		<div class="col-md-6" >		
		<div class="form-group">
			<h5>Supply Name<span class="text-danger">*</span></h5>
			<div class="controls">
				<select name="supply_id"  class="custom-select browser-default" >
					<option value="">Select Supply Name</option>
					@foreach($supplies as $supply)

					<option {{ $editData->supply_id =$supply->id ?'selected' :''  }} value="{{ $supply->id }}">{{ $supply->supply_name }}</option>

					@endforeach
				</select>
				
			</div>
			 
		</div>
	</div><!-- End Col Md-6 -->


	<div class="col-md-6" >		
		<div class="form-group">
			<h5>Quantity<span class="text-danger">*</span></h5>
			<div class="controls">
			 <input type="text" min="1" value="" name="qty"  class="custom-select browser-default" > 
				
			</div>
			 
		</div>
	</div><!-- End Col Md-6 -->

	<div class="col-md-6" >		
		<div class="form-group">
			<h5>Type<span class="text-danger">*</span></h5>
			<div class="controls">
				
				<select name="stock_note" id="" class="custom-select browser-default">
					<option value="">Select Type</option>
					<option {{ ($editData->stock_note == "1" ? "selected": "") }} value="1">Stock In</option>
					<option {{ ($editData->stock_note == "2" ? "selected": "") }} value="2">Use</option>
				</select>
				
			</div>
			 
		</div>
	</div><!-- End Col Md-6 -->

    </div> <!-- End Row -->



</div> <!-- End Col M12 -->

 <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
		<a href="{{ route('InOutList.view') }}" class="btn btn-rounded btn-success">Back</a>
    </div>
</form>


				</div>
			</div>
</div>
  <!-- /.row -->
</section>
		<!-- /.content -->
	  
	  </div>
  </div>


@endsection