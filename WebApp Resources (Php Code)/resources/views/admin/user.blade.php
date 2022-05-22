@extends('layouts.adminmain')
@section('main-container')
    
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
				<div class="p-4 bg-white rounded">
					<div class="row g-4 mb-4">
						<h1 class="app-page-title">Users</h1>
						<table class="table table-hover">
							<thead>
							  <tr>
								<th scope="col">Id</th>
								<th scope="col">Name</th>
								<th scope="col">Username</th>
								<th scope="col">Email</th>
								<th scope="col">City</th>
								<th scope="col">Gender</th>
								<th scope="col">Address</th>
								<th scope="col">Contact</th>
								<th scope="col">Image</th>
								<th></th>
							  </tr>
							</thead>
							<tbody>


								@foreach($users as $u)

									<tr>
									
										<td>#{{$u->id}}</td>
										<td>{{$u->name}}</td>
										<td>{{$u->username}}</td>
										<td>{{$u->email}}</td>
										<td>{{$u->city}}</td>

										@if($u->gender == 1)
										<td>Male</td>
										@else
										<td>Female</td>
										@endif
										


										<td>{{$u->address}} </td>
										<td>{{$u->contact}}</td>

										<td><img src="{{asset('images/user_images/'.$u->image.'')}}"
											style="width: 5em;"></td>

										{{-- <td><img src="{{url('/assets/images/Downloads/arham.jpg')}}" style="width: 5em;"></td> --}}
										<td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>  
									</tr>
									
								@endforeach



							  {{-- <tr>
								
								<td>1</td>
								<td>Arham Khalid</td>
								<td>Arham258</td>
								<td>arhamkk0000@gmail.com</td>
								<td>Karachi</td>
								<td>Male</td>
								<td>A551 blocK I north Nazimabad </td>
								<td>03472455980</td>
								<td><img src="{{url('/assets/images/Downloads/arham.jpg')}}" style="width: 5em;"></td>
								<td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>  
							</tr> --}}
							  {{-- <tr>
								
								<td>2</td>
								<td>Faseeh</td>
								<td>Faseeh12</td>
								<td>faseeh123@gmail.com</td>
								<td>Karachi</td>
								<td>Male</td>
								<td>A551 blocK J north Nazimabad  </td>
								<td>0314656465</td>
								<td><img src="{{url('/assets/images/Downloads/Faseeh.jpg')}}" style="width: 5em;"></td>
								<td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td> 
							</tr>
							  <tr>
								
								<td>3</td>
								<td>Naeem</td>
								<td>Naeem12</td>
								<td>naeem123@gmail.com</td>
								<td>Karachi</td>
								<td>Male</td>
								<td>B71 Gulistan-e-Johar  </td>
								<td>0336554644</td>
								<td><img src="{{url('/assets/images/Downloads/NAeem.jpg')}}" style="width: 5em;"></td>
								<td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>  
							</tr> --}}
							  
							</tbody>
						  </table>
					</div><!--//row-->
					
					  
					

				</div>
			   
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	</div>
    </div><!--//app-wrapper-->    					
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 
    <!-- Javascript -->          
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>  
    

    
    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script> 
    <script src="assets/js/charts-demo.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script> 

</body>
</html> 



@endsection