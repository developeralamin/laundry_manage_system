@extends('admin.admin_master')
@section('content')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">New Laundry
</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('laundryList.store') }}">
	 	@csrf

<div class="row">
	<div class="col-12">	

   <div class="row">
		<div class="col-md-12" >		
		<div class="form-group">
			<h5>Customer Name<span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="text" name="customer_name"  class="form-control" >  
			</div>
			 
		</div>
	</div><!-- End Col Md-6 -->

	  <div class="col-md-6" >		
		<div class="form-group">
			<h5>Remarks<span class="text-danger">*</span></h5>
			<div class="controls">
			
				<textarea class="form-control" cols="7" rows="7" name="remarks"></textarea>
			</div>
			 
		</div>
	</div><!-- End Col Md-6 -->
    </div> <!-- End Row -->


 <div class="row">
		<div class="col-md-6" >		
		<div class="form-group">
			<h5>Laundry Category<span class="text-danger">*</span></h5>
			<div class="controls">
				<select name="laundry_category_id" id="category_id" class="form-control laundry_category_id">
					 <option>Select Laundry Category</option>

							@foreach($laundry_categorys as $laundry_category)

							<option value="{{ $laundry_category->id }}">{{ $laundry_category->category_name }}</option>

							@endforeach
				</select>
			</div>
			 
		</div>

	</div><!-- End Col Md-6 -->

	  <div class="col-md-6" >		
		
		<div class="form-group">
			<h5>Weight<span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="number" min="1" value="1" name="weight"  onkeyup="getTotal()" id="weight"  class="form-control" >  
			</div>
			 
		</div>
	</div><!-- End Col Md-6 -->
    </div> <!-- End Row -->

 <div class="row">
		<div class="col-md-6" >		
		<div class="form-group">
			<h5>Unit Price<span class="text-danger">*</span></h5>
			<div class="controls">

         <input onkeyup="getTotal()" type="text" name="unit_price" class="form-control prod_price " 
            id="prod_price" value="0">

			</div>
		</div>
	</div><!-- End Col Md-6 -->

    </div> <!-- End Row -->


<div class="row">
		<div class="col-md-6" >		
		<div class="form-group">
			<h5>Amount<span class="text-danger">*</span></h5>
			<div class="controls">

         <input onkeyup="getTotal()" name="amount" type="text" class="form-control amount" 
            id="amount" value="0">

			</div>
		</div>
	</div><!-- End Col Md-6 -->

    </div> <!-- End Row -->


</div> <!-- End Col M12 -->


</div> <!-- End Row -->

 
  
						 
	 <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
		<a href="{{ route('laundryList.view') }}" class="btn btn-rounded btn-success">Back</a>
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

@section('footer_js')
	

<script type="text/javascript">

	$(document).ready(function () {

		$('#category_id').on('change', function(){
			var prod_id=$(this).val();

			$.ajax({
				url:'{{ route("findPrice")}}',
				data:{
					id:prod_id,
				},					
				success:function(data){			
					console.log(data.price);
					$('#prod_price').val(data.price);
				}
			});
		});

	});


//some javascript for price * weight == total_amount

 function getTotal() {
      var prod_price     = document.getElementById("prod_price").value;
      var weight         = document.getElementById("weight").value;
      if ( prod_price && weight ) {
        var amount = prod_price * weight;
        document.getElementById("amount").value = amount;
      }
    }
</script>





@endsection

