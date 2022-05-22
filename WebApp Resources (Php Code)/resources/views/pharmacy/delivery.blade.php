@extends('layouts.pharmacymain')
@section('main-container')

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="p-3 text-center bg-white rounded">

					<div class="col-auto">
						<h1 class="app-page-title mb-0">Delivery</h1>
					</div>
				</div>

			</div>
			<!--//row-->


			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
					href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
					href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Initiated</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
					href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Delivered</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-cancelled-tab" data-bs-toggle="tab"
					href="#orders-cancelled" role="tab" aria-controls="orders-cancelled"
					aria-selected="false">Cancelled</a>
			</nav>


			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">Order</th>
											<th class="cell">Products</th>
											<th class="cell">Customer</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total</th>
											<th class="cell">View Details</th>
											<th class="cell">Update Status</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>

										@if($from_where == 'searchComponent')


										@php
										$index = 1;
										@endphp


										@foreach($orders as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($array[$index]->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
												{{-- @foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach --}}
											</td>
											<td class="cell">{{$order->u_name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											@if($order->delivery_status == 'initiated')
											<td class="cell"><span class="badge bg-warning">initiated</span></td>
											@elseif($order->delivery_status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->delivery_status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											@else
											<td class="cell"><span class="badge bg-danger">NO STATUS</span></td>
											@endif

											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>

											{{-- <td>
												<h1>g546456</h1>
											</td> --}}

											<td>
												<div class="dropdown">
													<button class="btn btn-success dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
														Status
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('order/update/deliverystatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/initiated' )}}">Initiated</a>
														</li>
													</div>
												</div>
											</td>
										</tr>


										@php
										$index = $index + 1;
										@endphp


										@endforeach



										@else

										@foreach($orders as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
											</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											@if($order->delivery_status == 'initiated')
											<td class="cell"><span class="badge bg-warning">initiated</span></td>
											@elseif($order->delivery_status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->delivery_status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											@else
											<td class="cell"><span class="badge bg-danger">NO STATUS</span></td>
											@endif

											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>



											<td>
												<div class="dropdown">
													<button class="btn btn-success dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
														Status
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('order/update/deliverystatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/initiated' )}}">Initiated</a>
														</li>
													</div>
												</div>
											</td>

										</tr>

										@endforeach

										@endif



									</tbody>
								</table>
							</div>
							<!--//table-responsive-->

						</div>
						<!--//app-card-body-->
					</div>
					<!--//app-card-->

				</div>
				<!--//tab-pane-->

				<div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">
							<div class="table-responsive">

								<table class="table mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">Order</th>
											<th class="cell">Product</th>
											<th class="cell">Customer</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total</th>
											<th class="cell">View Details</th>
											<th class="cell">Update Status</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>


										@if($from_where == 'searchComponent')


										@php
										$index = 1;
										@endphp

										@foreach($initiated as $order)
										{{-- <h1>w</h1> --}}
										@if($order->delivery_status == 'initiated')

										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($array[$index]->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
												{{-- @foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach --}}
											</td>
											<td class="cell">{{$order->u_name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											@if($order->delivery_status == 'initiated')
											<td class="cell"><span class="badge bg-warning">initiated</span></td>
											@elseif($order->delivery_status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->delivery_status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											@else
											<td class="cell"><span class="badge bg-danger">NO STATUS</span></td>
											@endif

											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>

											<td>
												<div class="dropdown">
													<button class="btn btn-success dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
														Status
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('order/update/deliverystatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/initiated' )}}">Initiated</a>
														</li>
													</div>
												</div>
											</td>
										</tr>


										@php
										$index = $index + 1;
										@endphp

										@endif
										@endforeach



										@else

										@foreach($initiated as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
											</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											@if($order->delivery_status == 'initiated')
											<td class="cell"><span class="badge bg-warning">initiated</span></td>
											@elseif($order->delivery_status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->delivery_status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											@else
											<td class="cell"><span class="badge bg-danger">NO STATUS</span></td>
											@endif

											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>


											<td>
												<div class="dropdown">
													<button class="btn btn-success dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
														Status
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('order/update/deliverystatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/initiated' )}}">Initiated</a>
														</li>
													</div>
												</div>
											</td>
										</tr>
										@endforeach

										@endif


										{{-- @foreach($initiated as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
											</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											<td class="cell"><span class="badge bg-warning">initiated</span></td>


											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>

										</tr>
										@endforeach --}}



									</tbody>
								</table>
							</div>
							<!--//table-responsive-->
						</div>
						<!--//app-card-body-->
					</div>
					<!--//app-card-->
				</div>
				<!--//tab-pane-->

				<div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">Order</th>
											<th class="cell">Product</th>
											<th class="cell">Customer</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total</th>
											<th class="cell">View Details</th>
											<th class="cell">Update Status</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>
										@if($from_where == 'searchComponent')


										@php
										$index = 1;
										@endphp

										@foreach($delivered as $order)
										{{-- <h1>w</h1> --}}
										@if($order->delivery_status == 'delivered')

										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($array[$index]->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
												{{-- @foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach --}}
											</td>
											<td class="cell">{{$order->u_name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											@if($order->delivery_status == 'initiated')
											<td class="cell"><span class="badge bg-warning">initiated</span></td>
											@elseif($order->delivery_status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->delivery_status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											@else
											<td class="cell"><span class="badge bg-danger">NO STATUS</span></td>
											@endif

											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>

											<td>
												<div class="dropdown">
													<button class="btn btn-success dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
														Status
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('order/update/deliverystatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/initiated' )}}">Initiated</a>
														</li>
													</div>
												</div>
											</td>
										</tr>


										@php
										$index = $index + 1;
										@endphp

										@endif
										@endforeach



										@else

										@foreach($delivered as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
											</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											@if($order->delivery_status == 'initiated')
											<td class="cell"><span class="badge bg-warning">initiated</span></td>
											@elseif($order->delivery_status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->delivery_status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											@else
											<td class="cell"><span class="badge bg-danger">NO STATUS</span></td>
											@endif

											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>


											<td>
												<div class="dropdown">
													<button class="btn btn-success dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
														Status
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('order/update/deliverystatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/initiated' )}}">Initiated</a>
														</li>
													</div>
												</div>
											</td>
										</tr>
										@endforeach

										@endif


										{{-- @foreach($delivered as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
											</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											<td class="cell"><span class="badge bg-success">Delivered</span></td>



											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>

										</tr>
										@endforeach --}}

									</tbody>
								</table>
							</div>
							<!--//table-responsive-->
						</div>
						<!--//app-card-body-->
					</div>
					<!--//app-card-->
				</div>
				<!--//tab-pane-->
				<div class="tab-pane fade" id="orders-cancelled" role="tabpanel" aria-labelledby="orders-cancelled-tab">
					<div class="app-card app-card-orders-table mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">Order</th>
											<th class="cell">Product</th>
											<th class="cell">Customer</th>
											<th class="cell">Date</th>
											<th class="cell">Delivery Status</th>
											<th class="cell">Total</th>
											<th class="cell">Status Update</th>
											<th class="cell">View Details</th>
											<th class="cell">Update Status</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>
										@if($from_where == 'searchComponent')


										@php
										$index = 1;
										@endphp

										@foreach($cancelled as $order)
										{{-- <h1>w</h1> --}}
										@if($order->delivery_status == 'cancelled')

										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($array[$index]->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
												{{-- @foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach --}}
											</td>
											<td class="cell">{{$order->u_name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											@if($order->delivery_status == 'initiated')
											<td class="cell"><span class="badge bg-warning">initiated</span></td>
											@elseif($order->delivery_status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->delivery_status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											@else
											<td class="cell"><span class="badge bg-danger">NO STATUS</span></td>
											@endif

											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>


											<td>
												<div class="dropdown">
													<button class="btn btn-success dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
														Status
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('order/update/deliverystatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/initiated' )}}">Initiated</a>
														</li>
													</div>
												</div>
											</td>
										</tr>


										@php
										$index = $index + 1;
										@endphp

										@endif
										@endforeach



										@else

										@foreach($cancelled as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
											</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											@if($order->delivery_status == 'initiated')
											<td class="cell"><span class="badge bg-warning">initiated</span></td>
											@elseif($order->delivery_status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->delivery_status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											@else
											<td class="cell"><span class="badge bg-danger">NO STATUS</span></td>
											@endif

											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>


											<td>
												<div class="dropdown">
													<button class="btn btn-success dropdown-toggle" type="button"
														id="dropdownMenuButton" data-toggle="dropdown"
														aria-haspopup="true" aria-expanded="false">
														Status
													</button>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('order/update/deliverystatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('order/update/deliverystatus/' . $order->id . '/initiated' )}}">Initiated</a>
														</li>
													</div>
												</div>
											</td>
										</tr>
										@endforeach

										@endif
										{{-- @foreach($cancelled as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>



											<td>
												|
												@foreach($order->orderDetails as $detail)
												{{$detail->product->name}} |
												@endforeach
											</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>


											<td class="cell">${{$order->total}}</td>


											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a></td>

										</tr>
										@endforeach --}}


									</tbody>
								</table>
							</div>
							<!--//table-responsive-->
						</div>
						<!--//app-card-body-->
					</div>
					<!--//app-card-->
				</div>
				<!--//tab-pane-->
			</div>
			<!--//tab-content-->



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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<!-- Javascript -->
<script src="../assets/plugins/popper.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="{{asset('assets/plugins/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Page Specific JS -->

<script src="{{asset('/assets/js/app.js')}}"></script>

<script src="../assets/js/app.js"></script>


</body>


</html>

@endsection