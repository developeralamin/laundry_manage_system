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
	 <div class="col-md-6" >
		<div class="form-group">
			<h5>Customer Name<span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="text" name="customer_name"  class="custom-select browser-default" >
			</div>

		</div>
	</div><!-- End Col Md-6 -->


	 <div class="col-md-6" >
		<div class="form-group">
			<h5>Status<span class="text-danger">*</span></h5>
			<div class="controls">
				<select name="status" id="" class="custom-select browser-default">

					<option value="Pending">Pending</option>
					<option value="Processing">Processing</option>
					<option value="Ready to Claim">Ready to Claim</option>
					<option value="Claimed">Claimed</option>
				</select>
			</div>

		</div>
	</div><!-- End Col Md-6 -->

	  <div class="col-md-6" >
		<div class="form-group">
			<h5>Remarks<span class="text-danger">*</span></h5>
			<div class="controls">

				<textarea class="custom-select browser-default" cols="7" rows="7" name="remarks"></textarea>
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
				 <input type="number" min="1" value="0" name="weight"  onkeyup="getTotal()" id="weight"  class="custom-select browser-default" >
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
           <div class="form-group">
					<div class="custom-control " id="pay-switch">
					  <input type="checkbox" class="custom-control-input" value="1" name="pay_status" id="paid" >
					  <label class="custom-control-label" for="paid">Pay</label>
					</div>
				</div>


<div class="row" id="payment">


				<div class="col-md-6">
					<div class="form-group">
						<label for="" class="control-label">Amount Tendered</label>
						<input type="number"  value="<?php echo isset($amount_tendered) ? $amount_tendered : 0 ?>" step="any" min="0"  class="form-control text-left amount_tendered"  name="amount_tendered" id="amount_tendered">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="" class="control-label">Total Amount</label>
						<input type="number" value="<?php echo isset($total_amount) ? $total_amount : 0 ?>" onkeyup="getTotal()" step="any" min="1"  class="form-control text-left total_amount" id="total_amount" name="total_amount" readonly="">
					</div>
				</div>


				<div class="col-md-6">
					<div class="form-group">
						<label for="" class="control-label">Change</label>
						<input type="number" value="<?php echo isset($amount_change) ? $amount_change : 0 ?>" step="any" min="1"  class="form-control text-left" name="amount_change" id="amount_change" readonly="">
					</div>
				</div>
			</div>





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

 //some javascript for price * weight == total_amount
const $$ = (el) => document.querySelector(el);
 function getTotal() {
      var prod_price     = document.getElementById("prod_price").value;
      var weight         = document.getElementById("weight").value;
      // if ( prod_price && weight ) {
        var amount        = prod_price * weight;
        var total_amount  = prod_price * weight;
        // var amount_change  = (prod_price * weight);
        const amount_tendered = $$('#amount_tendered')
        const amount_change = $$('#amount_change')
        const temp = amount_tendered.value - total_amount;
        amount_change.value = temp
        //console.log(temp)
        document.getElementById("amount").value = amount;
        document.getElementById("total_amount").value = total_amount;
        // document.getElementById("amount_change").value = amount_change;

	    // var amount_tendered = total_amount - amount_change;

      // }
    }

const amount_tendered = $$('#amount_tendered')
amount_tendered.addEventListener('keyup',(e)=>{
    const total_amount = $$('#total_amount').value
    const temp  = e.currentTarget.value - total_amount;
   $$('#amount_change').value = temp

})

//hide and show pay portion using js

  if($('[name="pay_status"]').prop('checked') == true){
	 	$('[name="amount_tendered"]').attr('required',true)
	 	$('#payment').show();
	 }else{
	 	$('#payment').hide();
	 	$('[name="amount_tendered"]').attr('required',false)
	 }

 $('#pay-switch').click(function(){

 	if($('[name="pay_status"]').prop('checked') == true){
 		$('[name="amount_tendered"]').attr('required',true)
			$('#payment').show('slideDown');
		}

		else{
 		$('#payment').hide('SlideUp');
 		$('[name="amount_tendered"]').attr('required',false)
		}


	})





//select category pricee with jQuery

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



</script>





@endsection

