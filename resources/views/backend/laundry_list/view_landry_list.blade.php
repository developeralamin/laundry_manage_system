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
	
	<a href="{{ route('laundryList.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> New Laundry</a>			  
				</div>
				<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Date</th>
				<th>Customer Name</th>
				<th>Queue</th>
				<th>Status</th>
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>

	@forelse($allData as $key => $laundry )
			<tr class="text-white">
				<td>{{ $key+1 }}</td>
				<td><b>{{ date("M d, Y",strtotime($laundry->created_at))  }}</b></td>
				<td><b>{{ $laundry->customer_name }}</b></td>
				<td><b>{{ $laundry->customer_name }}</b></td>
				<td><b>{{ $laundry->status }}</b></td>
				
				<td>
<a href="{{ route('laundryList.edit',$laundry->id) }}" class="btn btn-xl btn-info">Edit</a>
<a href="{{ route('laundryList.delete',$laundry->id) }}" class="btn btn-xl btn-danger" id="delete">Delete</a>

				</td>
				 
			</tr>

  @empty

   <tr>
   	<td colspan="50" class="text-center">
   		You haven't no customer available 
   	</td>
   </tr>

@endforelse
							 
			</tbody>
			<tfoot>
				 
			</tfoot>
		  </table>
		</div>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	       
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection
