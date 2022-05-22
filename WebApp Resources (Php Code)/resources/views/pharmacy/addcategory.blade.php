@extends('layouts.pharmacymain')
@section('main-container')

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="p-4 bg-white rounded">
				<div class="row g-3 mb-4 align-items-center justify-content-between">
					<div class="col-auto">
						<h1 class="app-page-title mb-0">Product Type</h1>
					</div>
					<hr>

					<form action="{{url('add_medicine')}}" method="post" >
						@csrf
						<div class="form-group row">
							<label for="name" class="col-sm-2 col-form-label">Category Name</label>
							<div class="col-sm-6">
								<input type="name" name="name" class="form-control" id="name" placeholder="Category">
							</div>
						</div>
						<br>
						<div class="text-left">

							<button type="submit">
								<div class="btn text-white but"> Add </div>
							</button>
						</div>
						{{-- <div class="text-left">
							<div class="btn text-white but">Add</div>
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