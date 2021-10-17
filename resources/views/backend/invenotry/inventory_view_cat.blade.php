
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
	// $i = 1;
	// $supply = $conn->query("SELECT * FROM supply_list order by name asc");
	// while($row=$supply->fetch_assoc()):
	// 	$sup_arr[$row['id']] = $row['name'];
	// $inn = $conn->query("SELECT sum(qty) as inn FROM inventory where stock_type = 1 and supply_id = ".$row['id']);
	// $inn = $inn && $inn->num_rows > 0 ? $inn->fetch_array()['inn'] : 0;
	// $out = $conn->query("SELECT sum(qty) as `out` FROM inventory where stock_type = 2 and supply_id = ".$row['id']);
	// $out = $out && $out->num_rows > 0 ? $out->fetch_array()['out'] : 0;
	// $available = $inn - $out;
@endphp


			@forelse($allData as $key=>$data )						
				
	{{-- 	@php
       
         dd($data)

		@endphp
 --}}
			<tr class="text-white">
		               	<tr>
								<td class="text-center">{{ $key+1 }}</td>
								<td class="">{{ $data['supply']['supply_name'] }}</td>
								
	
		@if (DB::table('inventories')->where('stock_note',1)->count())
		

	     <td class="text-right">{{ $data->sum('qty') }}</td>

@else
 
@endif

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