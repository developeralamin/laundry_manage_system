@extends('admin.admin_master')
@section('content')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
	
	<div class="col-12">

	 <div class="box">
  <div class="box-header with-border">
	<h3 class="box-title">Laundry Reports</h3>
		  
</div>
				<!-- /.box-header -->
		<div class="box-body">
			
	<form method="get" action="{{ route('report.view') }}">

	 	@csrf
<div class="row clearfix page_header">

		<div class="col-md-10">
			<div class="form-row ">
				
			    <div class="col-auto">
			      	<label class="sr-only" for="inlineFormInput">Start Date</label>
			      
			      	<input type="date" value="start_date" name="start_date" class="form-control">
			    </div>

			    <div class="col-auto">
			      	<label class="sr-only" for="inlineFormInputGroup">End Date</label>
			      	<div class="input-group mb-2">
			        
			        	<input type="date" value="end_date" name="end_date" class="form-control">
			      	</div>
			    </div>

			    <div class="col-auto">
			      	<button type="submit" class="btn btn-primary mb-2">Submit</button>
			    </div>
			</div>
	
		</div>
	</div>

</form>


	<!-- DataTales Example -->
	  <div class="card shadow mb-4">
	    <div class="card-header py-3">
	     
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-striped table-borderless" cellspacing="0">
	          <thead>
	            <tr>
	            	<th>Date</th>
	              	<th>Customer Name</th>
	              	<th>Total Amount</th>
	              	{{-- <th>Actions</th> --}}
	            </tr>
	          </thead>
	          
	          <tbody>
	          	 @foreach($data as $key=>$data)


 
                <tr class="text-white">
				<td>{{  date("M d, Y",strtotime($data['created_at'])) }}</td>
				<td><b>{{ $data->customer_name }}</b></td>
				<td class="text-right"><b>{{ number_format($data['total_amount'],2) }}</b></td>

		
		
			       </tr>
	          	 @endforeach


	          </tbody>

	      @php
								
	$totalProfitToday=0;
     $totalProfitToday = DB::table('laundry_lists')->whereBetween('created_at',[$start_date,$end_date])->sum("total_amount");
		// $total += $totalProfitToday['total_amount'];

		@endphp
                <tfoot>
					<tr>
						<td class="text-right" colspan="2">Total</td>
						<td class="text-right">{{ number_format($totalProfitToday,2) }} </td>
					</tr>
				</tfoot>

	        </table>
	      </div>
	    </div>
	  </div>






		</div>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	       
	</div>
	<!-- /.col -->

  <!-- /.row -->
</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection
