@extends('layouts.pharmacymain')
@section('main-container')

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="p-4 bg-white rounded">

				<div class="row g-3 mb-4 align-items-center justify-content-between">
					<div class="col-auto">
						<h1 class="app-page-title mb-0">Top Sales</h1>
					</div>
					<div class="col-auto">
						<div class="page-utilities">
							<select class="form-select form-select-sm w-auto" id="Selection">
								<option selected value="0">All</option>
								<option value="1">Daily</option>
								<option value="2">Weekly</option>
								<option value="3">Monthly</option>
							</select>
						</div>
						<!--//page-utilities-->
					</div>
					<div class="table-responsive">
						<table class="table table-hover" >
							<thead>
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Category</th>
	
									<th scope="col">Orders Placed</th>
									<th scope="col">Quantity</th>
									<th scope="col">Amount</th>
								</tr>
							</thead>
							<tbody id="my_TABLE_FOR_AJAX">

								{{-- @for($i = 1; $i <= $count; $i++) <tr>

									<td>{{$prod_name[$i]}}</td>

									<td>{{$prod_cat[$i]}}</td>

									<td> {{$orders[$i-1]->order_placed }} </td>
									<td> {{$qty_array[$i]}} </td>
									<td> Rs. {{$price_array[$i+1]}} </td>


									</tr>
								@endfor --}}

								{{-- @for($i = 1; $i <= $count; $i++) <tr>

									<td>{{$prod_name[$i]}}</td>

									<td>{{$prod_cat[$i]}}</td>

									<td> {{$orders[$i-1]->order_placed }} </td>
									<td> {{$qty_array[$i]}} </td>
									<td> Rs. {{$price_array[$i+1]}} </td>


									</tr>
								@endfor --}}

								{{-- <h1> {{$SalesOr[0]['prod_name']}} </h1> --}}

								{{-- @foreach ($SalesOr as $item) --}}
									@for($i = 0; $i < $count; $i++)
										<tr>

										{{-- <td>{{$SalesOr->prod_cat}} {{$SalesOr[0]['prod_name']}}</td>  --}}
										<td> {{$SalesOr[$i]['prod_name']}} </td>
	
										<td> {{$SalesOr[$i]['prod_cat']}} </td>
	
										<td>  {{$SalesOr[$i]['order_placed']}}  </td>
										<td>  {{$SalesOr[$i]['quantity']}}  </td>
										<td> Rs.  {{$SalesOr[$i]['amount']}}  </td>
	
	
										</tr>
									@endfor
								
								{{-- @endforeach --}}

							</tbody>
						</table>

					</div>
				</div>

				
				<input type="hidden" id='id_text' value="{{$pharmacy_id}}">

			</div>
			<!--//row-->














		</div>
		<!--//container-fluid-->
	</div>
	<!--//app-content-->

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
<script>
    jQuery(document).ready(function(){
        
        // jQuery('#Selection').change(function(){
        //     // alert('h');
        //     let cid=jQuery(this).val();
        //     // alert(cid);
        //     jQuery('#subCategory').html('<option value="">Select SubCategory</option>')
        //     jQuery.ajax({
        //         url:'/api/getCategory',
        //         type:'post',
        //         data:'cid='+cid+'&_token={{csrf_token()}}',
        //         success:function(result){
        //             jQuery('#subCategory').html(result)
        //         }
        //     });
        // });

// 		$.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });

		jQuery('#Selection').change(function(){
            // alert('h');
            let cid=jQuery(this).val();

			const myElement = document.getElementById("id_text").value;
			// alert(myElement);
			// console.log(myElement);
            // alert(cid);
            // jQuery('#my_TABLE_FOR_AJAX').html('<option value="">Select SubCategory</option>')
            jQuery.ajax({
                url:'/api/getSelection',
				data: { 
					show_in: cid, 
					pharmacy_id : myElement,
					// pharmacy_id: cid, 
					// UserID: UserID, 
					// EmailAddress: EmailAddress
				},
                // type:'post',
				type:'get',
                // data:'&_token={{csrf_token()}}',
				// data:'cid='+cid+'&_token={{csrf_token()}}',
                success:function(result){
                    jQuery('#my_TABLE_FOR_AJAX').html(result)
                }
            });
        });

		
        
        // jQuery('#state').change(function(){
        //     let sid=jQuery(this).val();
        //     jQuery.ajax({
        //         url:'/getCity',
        //         type:'post',
        //         data:'sid='+sid+'&_token={{csrf_token()}}',
        //         success:function(result){
        //             jQuery('#city').html(result)
        //         }
        //     });
        // });
        
    });
        
    </script>


</div>
<!--//app-wrapper-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<!-- Javascript -->
<script src="../assets/plugins/popper.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Page Specific JS -->
<script src="../assets/js/app.js"></script>

</body>

</html>


@endsection