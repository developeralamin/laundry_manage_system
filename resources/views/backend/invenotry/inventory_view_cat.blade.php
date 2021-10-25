
@extends('admin.admin_master')
@section('content')

 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	 @php
 	  
       // $user_ip = $_SERVER['REMOTE_ADDR'];
       $inventory = App\Models\Inventory::get();
      
      
   @endphp		

		<!-- Main content -->
		<section class="content">
		  <div class="row">

	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-10">
				<div class="card">
					<div class="card-header">
						<h4><b>Inventory</b></h4>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th class="text-center">#</th>
								<th class="text-center">Supply Name</th>
								<th class="text-center">Stock Available</th>
							</thead>
								<tbody>
@php
	
@endphp

			@forelse($inventories as $key=>$inventory )						
			
			<tr class="text-white">
		               	<tr>
								<td class="text-center">{{ $key+1 }}</td>
								<td class="">{{ $supplies[$inventory->supply_id]->supply_name }}</td>
								
			{{-- @if(DB::table('inventories')->where('stock_note',1)->count())
					     <td class="text-right">{{ $data->sum('qty') }}</td>
			@elseif(DB::table('inventories')->where('stock_note',2)->count())
			 <td class="text-right">{{ $data->sub('qty') }}</td>
			@endif --}}
			<td>{{ $inventory->summed }}</td>
							</tr>
				 
			</tr>

  @empty

   <tr>
   	<td colspan="50" class="text-center">
   		You haven't no item
   	</td>
   </tr>

@endforelse
							 
			</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

  <!-- /.row -->
</section>
		<!-- /.content -->
	  
	  </div>
  </div>



@endsection