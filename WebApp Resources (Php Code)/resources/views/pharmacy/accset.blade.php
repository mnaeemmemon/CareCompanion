@extends('layouts.pharmacymain')
@section('main-container')
    
<div class="app-wrapper">

<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<div class="p-4 bg-white rounded">
		<h1 class="app-page-title">Account Settings</h1>
			<hr>
		<div class="row g-4 settings-section">
			
			<div class="col-12 col-md-8">
				<div class="app-card app-card-settings p-4">
					
					<div class="app-card-body">
						<form class="settings-form" action="{{url('Pharmacy_setting')}}" method="post" enctype="multipart/form-data">
							@csrf

							{{-- <div class="form-group">
								<label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Select Image</label>
								<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
			
							  </div> --}}

							<div class="mb-3">
								<label for="setting-input-1" class="form-label">Select Image</label>
								<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
							</div>
							{{-- <div class="mb-3">
								<label for="setting-input-1" class="form-label">Select Image</label>
								<input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
							</div> --}}

							<div class="mb-3">
								<label for="setting-input-1" class="form-label">Pharmacy Name</label>
								<input type="text" class="form-control" value="{{$handler->pharmacy->name}}" name="pharmacy_name" id="setting-input-1" placeholder="Louis James" required>
							</div>
							<div class="mb-3">
								<label for="setting-input-1" class="form-label">Username</label>
								<input type="text" class="form-control" value="{{$handler->username}}" name="username" id="setting-input-1" placeholder="Louis James" required>
							</div>
							<div class="mb-3">
								<label for="setting-input-2" class="form-label">Contact Number</label>
								<input type="text" class="form-control" value="{{$handler->contact}}" name="contact" id="setting-input-2" placeholder="+509 2222813123" required>
							</div>
							<div class="mb-3">
								<label for="setting-input-3" class="form-label">Email Address</label>
								<input type="email" class="form-control" value="{{$handler->email}}" name="email" id="setting-input-3" placeholder="abc@gmail.com">
							</div>
							<div class="mb-3">
								<label for="setting-input-3" class="form-label">Address</label>
								<input type="text" class="form-control" value="{{$handler->pharmacy->address}}" name="address" id="setting-input-3" placeholder="Street#,Block#, ....">
							</div>
							<div class="mb-3">
								<label for="setting-input-3" class="form-label">City</label>
								<input type="text" class="form-control" value="{{$handler->pharmacy->city}}" name="city" id="setting-input-3" placeholder="Washington">
							</div>
							
							
							<button type="submit" class="btn app-btn-primary">Update</button>
						</form>
					</div><!--//app-card-body-->
					
				</div><!--//app-card-->
			</div>
		</div><!--//row-->
		</div>

		

		

		
		
		  
		
			
			

		   
		
	</div><!--//container-fluid-->
</div><!--//app-content-->
</div>


				
				


</div><!--//app-wrapper-->    					
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<!-- Javascript -->          
<script src="../assets/plugins/popper.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>  

<!-- Page Specific JS -->
<script src="../assets/js/app.js"></script> 

</body>
</html> 

@endsection