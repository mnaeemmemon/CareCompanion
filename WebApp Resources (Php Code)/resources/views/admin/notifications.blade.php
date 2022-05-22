@extends('layouts.adminmain')
@section('main-container')

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="position-relative mb-3">
				<div class="row g-3 justify-content-between">
					<div class="p-4 bg-white rounded">

						<div class="col-auto">
							<h1 class="app-page-title mb-0">Notifications</h1>
						</div>
					</div>

				</div>
			</div>



			{{-- @foreach($nots as $not)


			<div class="app-card app-card-notification shadow-sm mb-4">
				<div class="app-card-header px-4 py-3">
					<div class="row g-3 align-items-center">

						<div class="col-12 col-lg-auto text-center text-lg-start">
							<h4 class="notification-title mb-1">{{$not->type->name}}</h4>

							@if($not->seen == 0)
							<span style="color: green">Unseen</span>
							@elseif($not->seen == 1)
							<span>Seen</span>
							@endif

							<ul class="notification-meta list-inline mb-0">
								<li class="list-inline-item">{{

									// Carbon\Carbon::parse($not->date)->format('Y-m-d H:i:s');
									\Carbon\Carbon::parse($not->date)->diffForHumans()

									}}</li>

								@if($not->sender_type == 0)
								<li class="list-inline-item">{{$not->user->name}}</li>
								@elseif($not->sender_type == 1)
								<li class="list-inline-item">{{$not->pharmacist->pharmacy->name}}</li>
								@endif

							</ul>

						</div>
						<!--//col-->

						<a href="{{ url('mark_as_read',$not->id) }}"> <button style="width:120px;"
								class="btn btn-info float-right">Mark as Seen</button> </a>

					</div>
					<!--//row-->
				</div>
				<!--//app-card-header-->
				<div class="app-card-body p-4">
					<div class="notification-content">{{$not->history}}</div>
				</div>
				<!--//app-card-body-->

			</div>
			<!--//app-card-->

			@endforeach --}}


			@foreach($nots as $not)
			<div class="app-card app-card-notification shadow-sm mb-4">



				<div class="app-card-header px-4 py-3">
					<div class="row g-3 align-items-center">

						<div class="col-12 col-lg-auto text-center text-lg-start">
							<h4 class="notification-title mb-1">{{$not->type->name}}</h4>

							@if($not->seen == 0)
							<span style="color: green">Unseen</span>
							@elseif($not->seen == 1)
							<span>Seen</span>
							@endif

							<ul class="notification-meta list-inline mb-0">
								<li class="list-inline-item">{{

									// Carbon\Carbon::parse($not->date)->format('Y-m-d H:i:s');
									\Carbon\Carbon::parse($not->date)->diffForHumans()

									}}</li>
								<li class="list-inline-item">|</li>

								@if($not->sender_type == 0)
								<li class="list-inline-item">{{$not->user->name}}</li>
								@elseif($not->sender_type == 1)
								<li class="list-inline-item">{{$not->pharmacist->pharmacy->name}}</li>
								@endif


							</ul>
						</div>

						<!--//col-->

					</div>
					{{-- <div style="background-color: red; width:100px;">
						hu
					</div> --}}
					<a href="{{ url('mark_as_read',$not->id) }}"> <button style="width:120px;"
							class="btn btn-info float-right">Mark as Seen</button> </a>

					<!--//row-->
				</div>

				<!--//app-card-header-->
				<div class="app-card-body p-4">
					<div class="notification-content">{{$not->history}}</div>
				</div>
				<!--//app-card-body-->


			</div>
			<!--//app-card-->
			@endforeach

			{{-- <div class="app-card app-card-notification shadow-sm mb-4">
				<div class="app-card-header px-4 py-3">
					<div class="row g-3 align-items-center">

						<div class="col-12 col-lg-auto text-center text-lg-start">
							<h4 class="notification-title mb-1">10000 Deposited in Your Account</h4>

							<ul class="notification-meta list-inline mb-0">
								<li class="list-inline-item">4 hrs ago</li>
								<li class="list-inline-item">|</li>
								<li class="list-inline-item">Subhan Saeed</li>
							</ul>

						</div>
						<!--//col-->
					</div>
					<!--//row-->
				</div>
				<!--//app-card-header-->
				<div class="app-card-body p-4">
					<div class="notification-content">Payment From Subhan Saeed, Details are ......</div>
				</div>
				<!--//app-card-body-->

			</div>
			<!--//app-card-->

			<div class="app-card app-card-notification shadow-sm mb-4">
				<div class="app-card-header px-4 py-3">
					<div class="row g-3 align-items-center">

						<div class="col-12 col-lg-auto text-center text-lg-start">
							<h4 class="notification-title mb-1">You have 1 new message</h4>

							<ul class="notification-meta list-inline mb-0">
								<li class="list-inline-item">7 hrs ago</li>
								<li class="list-inline-item">|</li>
								<li class="list-inline-item">Sumaima</li>
							</ul>

						</div>
						<!--//col-->
					</div>
					<!--//row-->
				</div>
				<!--//app-card-header-->
				<div class="app-card-body p-4">
					<div class="notification-content">Message From Sumaima, Details are ......</div>
				</div>
				<!--//app-card-body-->

			</div>
			<!--//app-card-->

			<div class="app-card app-card-notification shadow-sm mb-4">
				<div class="app-card-header px-4 py-3">
					<div class="row g-3 align-items-center">

						<div class="col-12 col-lg-auto text-center text-lg-start">
							<h4 class="notification-title mb-1">You have 1 new message</h4>

							<ul class="notification-meta list-inline mb-0">
								<li class="list-inline-item">12 hrs ago</li>
								<li class="list-inline-item">|</li>
								<li class="list-inline-item">Sami</li>
							</ul>

						</div>
						<!--//col-->
					</div>
					<!--//row-->
				</div>
				<!--//app-card-header-->
				<div class="app-card-body p-4">
					<div class="notification-content">Message From Sami, Details are ......</div>
				</div>
				<!--//app-card-body-->

			</div>
			<!--//app-card-->

			<div class="app-card app-card-notification shadow-sm mb-4">
				<div class="app-card-header px-4 py-3">
					<div class="row g-3 align-items-center">

						<div class="col-12 col-lg-auto text-center text-lg-start">
							<h4 class="notification-title mb-1">You have 1 new message</h4>

							<ul class="notification-meta list-inline mb-0">
								<li class="list-inline-item">1 day ago</li>
								<li class="list-inline-item">|</li>
								<li class="list-inline-item">Saim</li>
							</ul>

						</div>
						<!--//col-->
					</div>
					<!--//row-->
				</div>
				<!--//app-card-header-->
				<div class="app-card-body p-4">
					<div class="notification-content">Message From Saim, Details are ......</div>
				</div>
				<!--//app-card-body-->

			</div>
			<!--//app-card--> --}}


		</div>






	</div>
	<!--//container-fluid-->
</div>
<!--//app-content-->


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