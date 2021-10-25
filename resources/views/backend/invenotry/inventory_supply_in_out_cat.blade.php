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
						Supply In/Out List
						<a href="{{ route('inventory.add') }}" class="btn btn-primary  float-right" id="manage-supply">Manage Supply</a>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">SL</th>
								<th class="text-center">Date</th>
								<th class="text-center">Supply Name</th>
								<th class="text-center">Qty</th>
								<th class="text-center">Type</th>
								<th class="text-center">Actions</th>
							</thead>
		<tbody>
	@forelse($allData as $key => $inventory )
			<tr class="text-white">

				<td>{{ $key+1 }}</td>
				<td><b>{{  date("M d, Y",strtotime($inventory['created_at'])) }}</b></td>
				<td><b>{{ $inventory['supply']['supply_name'] }}</b></td>
				<td  class="text-right"><b>{{ $inventory->qty }}</b></td>
	
				@if($inventory->stock_note == 1)

					<td class="text-center"><span class="badge badge-primary"> IN </span></td>

				@else

					<td class="text-center"><span class="badge badge-secondary"> Used </span></td>
				@endif	

				<td>
   {{-- <a href="{{ route('inventory.edit',$inventory->id) }}" class="btn btn-sm btn-info">Edit</a> --}}
   <a href="{{ route('inventory.delete',$inventory->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>

				</td>
				 
			</tr>

  @empty

   <tr>
   	<td colspan="50" class="text-center">
   		You haven't no laundry item
   	</td>
   </tr>

@endforelse
							 
			</tbody>
						</table>
					</div>
				</div>
			</div>




</div>
  <!-- /.row -->
</section>
		<!-- /.content -->
	  
	  </div>
  </div
@endsection		  	