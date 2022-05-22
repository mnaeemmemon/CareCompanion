@extends('layouts.pharmacymain')
@section('main-container')

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">



		@if(Auth::guard('pharmacist')->check())
		<h1> Hello Mr. {{Auth::guard('pharmacist')->user()->name}} </h1>
		@endif


		<div class="row g-4 mb-4">
			<div class="col-6 col-lg-3">
				<div class="app-card app-card-stat shadow-sm h-100 gren">
					<div class="app-card-body p-3 p-lg-4">
						<h4 class="stats-type mb-1">Total Sales</h4>
						<div class="stats-figure">${{$sales}} </div>

					</div>
					<!--//app-card-body-->
					<a class="app-card-link-mask" href="#"></a>
				</div>
				<!--//app-card-->
			</div>
			<!--//col-->

			<div class="col-6 col-lg-3">
				<div class="app-card app-card-stat shadow-sm h-100 gren">
					<div class="app-card-body p-3 p-lg-4">
						<h4 class="stats-type mb-1">Medicine</h4>
						<div class="stats-figure">{{$medicine}}</div>

					</div>
					<!--//app-card-body-->
					<a class="app-card-link-mask" href="#"></a>
				</div>
				<!--//app-card-->
			</div>
			<!--//col-->
			<div class="col-6 col-lg-3">
				<div class="app-card app-card-stat shadow-sm h-100 gren">
					<div class="app-card-body p-3 p-lg-4">
						<h4 class="stats-type mb-1">Orders</h4>
						<div class="stats-figure">{{$orders}}</div>

					</div>
					<!--//app-card-body-->
					<a class="app-card-link-mask" href="#"></a>
				</div>
				<!--//app-card-->
			</div>
			<!--//col-->
			<div class="col-6 col-lg-3">
				<div class="app-card app-card-stat shadow-sm h-100 gren">
					<div class="app-card-body p-3 p-lg-4">
						<h4 class="stats-type mb-1">Chat</h4>
						<div class="stats-figure">{{$count_chat}}</div>
					</div>
					<!--//app-card-body-->
					<a class="app-card-link-mask" href="#"></a>
				</div>
				<!--//app-card-->
			</div>
			<!--//col-->
		</div>
		<!--//row-->
		<div class="row g-4 mb-4">
			<div class="col-12 col-lg-6">
				<div class="app-card app-card-chart h-100 shadow-sm">
					<div class="app-card-header p-3">
						<div class="row justify-content-between align-items-center">
							<div class="col-auto">
								<h4 class="app-card-title">Medicine Stats</h4>
							</div>
							<!--//col-->
							<div class="col-auto">
								<!--//card-header-actions-->
							</div>
							<!--//col-->
						</div>
						<!--//row-->
					</div>
					<!--//app-card-header-->
					<div class="app-card-body p-3 p-lg-4">
						<div class="mb-3 d-flex">
							{{-- <select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
								<option value="1" selected>This week</option>
								<option value="2">Today</option>
								<option value="3">This Month</option>
								<option value="3">This Year</option>
							</select> --}}
						</div>
						<div class="chart-container">
							<canvas id="canvas-linechart"></canvas>
						</div>
					</div>
					<!--//app-card-body-->
				</div>
				<!--//app-card-->
			</div>
			<!--//col-->
			<div class="col-12 col-lg-6">
				<div class="app-card app-card-chart h-100 shadow-sm">
					<div class="app-card-header p-3">
						<div class="row justify-content-between align-items-center">
							<div class="col-auto">
								<h4 class="app-card-title">Sales Stats</h4>
							</div>
							<!--//col-->
							<div class="col-auto">
								<!--//card-header-actions-->
							</div>
							<!--//col-->
						</div>
						<!--//row-->
					</div>
					<!--//app-card-header-->
					<div class="app-card-body p-3 p-lg-4">
						{{-- <div class="mb-3 d-flex">
							<select class="form-select form-select-sm ms-auto d-inline-flex w-auto">
								<option value="1" selected>This week</option>
								<option value="2">Today</option>
								<option value="3">This Month</option>
								<option value="3">This Year</option>
							</select>
						</div> --}}
						<div class="chart-container">
							<canvas id="canvas-barchart"></canvas>
						</div>
					</div>
					<!--//app-card-body-->
				</div>
				<!--//app-card-->
			</div>
			<!--//col-->

		</div>
		<!--//row-->



	</div>
	<!--//container-fluid-->
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
								@elseif($not->sender_type == 2)
								<li class="list-inline-item">Admin</li>
								@endif


							</ul>
						</div>

						<!--//col-->

					</div>
					{{-- <div style="background-color: red; width:100px;">
						hu
					</div> --}}
					<a href="{{ url('mark_as_read_pharmacy',$not->id) }}"> <button style="width:120px;"
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
							<h4 class="notification-title mb-1">You have 1 new order</h4>

							<ul class="notification-meta list-inline mb-0">
								<li class="list-inline-item">2 hrs ago</li>
								<li class="list-inline-item">|</li>
								<li class="list-inline-item">Faisal Majeed</li>
							</ul>

						</div>
						<!--//col-->
					</div>
					<!--//row-->
				</div>
				<!--//app-card-header-->
				<div class="app-card-body p-4">
					<div class="notification-content">Order From Faisal Majeed, Details are ......</div>
				</div>
				<!--//app-card-body-->

			</div>
			<!--//app-card-->

			<div class="app-card app-card-notification shadow-sm mb-4">
				<div class="app-card-header px-4 py-3">
					<div class="row g-3 align-items-center">

						<div class="col-12 col-lg-auto text-center text-lg-start">
							<h4 class="notification-title mb-1">You have 1 new order</h4>

							<ul class="notification-meta list-inline mb-0">
								<li class="list-inline-item">4 hrs ago</li>
								<li class="list-inline-item">|</li>
								<li class="list-inline-item">Khurram Majeed</li>
							</ul>

						</div>
						<!--//col-->
					</div>
					<!--//row-->
				</div>
				<!--//app-card-header-->
				<div class="app-card-body p-4">
					<div class="notification-content">Order From Khurram Majeed, Details are ......</div>
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

			</div> --}}
			<!--//app-card-->
			<!--//app-card-->
			<div class="text-center mt-4"><a class="btn app-btn-secondary" href="{{url('/pharmacynotifications')}}">See
					more notifications</a></div>

		</div>
	</div>
	<!--//app-content-->



</div>
</div>
<!--//app-wrapper-->


<!-- Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../assets/plugins/popper.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Charts JS -->
<script src="../assets/plugins/chart.js/chart.min.js"></script>
<script src="../assets/js/index-charts.js"></script>

<!-- Page Specific JS -->
<script src="../assets/js/app.js"></script>

</body>

</html>

@endsection