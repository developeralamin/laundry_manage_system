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
	<h3 class="box-title">Laundry Category List</h3>
	<a href="{{ route('laundry.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Laundry Category</a>			  
				</div>
				<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Category</th>
				<th>Price per kg.</th>
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
	@forelse($allData as $key => $laundry )
			<tr class="text-white">
				<td>{{ $key+1 }}</td>
				<td><b>{{ $laundry->category_name }}</b></td>
				<td><b>{{ $laundry->price }}</b></td>
				<td>
<a href="{{ route('laundry.edit',$laundry->id) }}" class="btn btn-sm btn-info">Edit</a>
<a href="{{ route('laundry.delete',$laundry->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>

				</td>
				 
			</tr>

  @empty

   <tr>
   	<td colspan="50" class="text-center">
   		You haven't no course item
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
