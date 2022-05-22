@extends('layouts.pharmacymain')
@section('main-container')
    
<div class="app-wrapper">

<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<div class="p-3 text-center bg-white rounded">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Invoice</h1>
				</div>
				<hr>
				<form action="{{url('api/generate-pharmacy-invoice')}}" method="post">
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Pharmacy Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="name"  name="pharmacy_name" placeholder="Medicine name">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="patient_name" class="col-sm-2 col-form-label">Patient Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="Gram" name="patient_name" 
								placeholder="Enter Patient name">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="Date" class="col-sm-2 col-form-label">Date</label>
						<div class="col-sm-6">
							<input type="date" class="form-control" id="Gram" name="date" placeholder="Enter date">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="status" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="Gram" name="status" placeholder="Delivered">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Delivery Boy Name</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="delboy_name" id="delboy_name" placeholder="Rider name">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="amount" class="col-sm-2 col-form-label">No of products</label>
						<div class="col-sm-6">
							<input type="number" class="form-control" name="no_of_products" id="no_of_products" placeholder="Enter Products">
						</div>
					</div>
					<br>
					<div class="form-group row">
						<label for="amount" class="col-sm-2 col-form-label">Total Amount</label>
						<div class="col-sm-6">
							<input type="number" class="form-control" name="total_amount" id="total_amount" placeholder="Enter Amount">
						</div>
					</div>
<br>
					{{-- <div class="text-left">
						<button class="btn text-white border border-danger" type="submit"><a href="{{url('/pharmacyslip')}}">Generate</a></button>
					</div> --}}

					<div class="text-left">
						<button style="color: green" class="btn text-green border border-danger" type="submit">GENERATE</button>
					</div>

					{{-- <div class="text-left">
						<button class="btn text-white border border-danger" type="submit"><a href="#">Generate</a></button>
					</div> --}}

					{{-- <div class="text-left">
						<button class="btn text-white border border-danger" type="submit">Generate</button>
					</div> --}}

					{{-- <div class="text-left">
						<button class="btn text-white border border-danger">Generate</button>
					</div> --}}

				</form>





			</div>
			<!--//row-->
		</div>




	</div>
	<!--//container-fluid-->
</div>
<!--//app-content-->
</div>





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