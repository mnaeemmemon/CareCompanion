@extends('layouts.pharmacymain')
@section('main-container')

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="p-3 text-center bg-white rounded">
					<div class="col-auto">
						<h1 class="app-page-title mb-0">Orders</h1>
					</div>
				</div>





			</div>
			<!--//row-->
			<nav id="orders-table-tab" class="orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4">
				<a class="flex-sm-fill text-sm-center nav-link active" id="orders-all-tab" data-bs-toggle="tab"
					href="#orders-all" role="tab" aria-controls="orders-all" aria-selected="true">All</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-paid-tab" data-bs-toggle="tab"
					href="#orders-paid" role="tab" aria-controls="orders-paid" aria-selected="false">Delivered</a>
				<a class="flex-sm-fill text-sm-center nav-link" id="orders-pending-tab" data-bs-toggle="tab"
					href="#orders-pending" role="tab" aria-controls="orders-pending" aria-selected="false">Pending</a>
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
											<th class="cell">Order Id</th>
											<th class="cell">Patient Name</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total Amount</th>
											<th class="cell">Actions</th>
											<th class="cell">Status Update</th>
										</tr>
									</thead>
									<tbody>


										@if($from_where == 'searchComponent')
										@foreach($orders as $order)

										<tr>
											<td class="cell">#{{$order->id}}</td>
											<td class="cell">{{$order->u_name}}</td>
											<td class="cell">{{$order->placed_date}}</td>

											@if($order->status == 'pending')
											<td class="cell"><span class="badge bg-warning">Pending</span></td>
											@elseif($order->status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>

											@endif


											<td class="cell">${{$order->total}}</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a>

												<a class="btn-sm btn-danger"
													href="{{url('/deleteOrder',$order->id)}}">Delete</a>


												<a class="btn-sm btn-success"
													href="{{url('api/invoice',$order->id)}}">Invoice</a>

											</td>
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
																href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/pending' )}}">Pending</a>
														</li>
													</div>
												</div>
											</td>


										</tr>


										@endforeach
										@else
										@foreach($orders as $order)

										<tr>
											<td class="cell">#{{$order->id}}</td>
											<td class="cell">{{$order->user->name}}</td>
											<td class="cell">{{$order->placed_date}}</td>

											@if($order->status == 'pending')
											<td class="cell"><span class="badge bg-warning">Pending</span></td>
											@elseif($order->status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>

											@endif


											<td class="cell">${{$order->total}}</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a>

												<a class="btn-sm btn-danger"
													href="{{url('/deleteOrder',$order->id)}}">Delete</a>


												<a class="btn-sm btn-success"
													href="{{url('api/invoice',$order->id)}}">Invoice</a>

											</td>
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
																href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/pending' )}}">Pending</a>
														</li>
													</div>
												</div>
											</td>


										</tr>


										@endforeach
										@endif







										{{-- <tr>
											<td class="cell">#15345</td>
											<td class="cell">Saad ayub</td>
											<td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span></td>
											<td class="cell">$259.35</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2')}}">View</a> <a
													class="btn-sm btn-danger" href="#">Delete</a>
											</td>
										</tr>
										<tr>
											<td class="cell">#15344</td>
											<td class="cell">Muhammad Ayub</td>
											<td class="cell"><span class="cell-data">16 Oct</span><span
													class="note">01:16 AM</span></td>
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											<td class="cell">$123.00</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2')}}">View</a> <a
													class="btn-sm btn-danger" href="#">Delete</a>
											</td>
										</tr>

										<tr>
											<td class="cell">#15343</td>
											<td class="cell">Jayden Massey</td>
											<td class="cell"><span class="cell-data">15 Oct</span><span
													class="note">8:07 PM</span></td>
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											<td class="cell">$199.00</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2')}}">View</a> <a
													class="btn-sm btn-danger" href="#">Delete</a>
											</td>
										</tr>

										<tr>
											<td class="cell">#15342</td>
											<td class="cell">Reina Brooks</td>
											<td class="cell"><span class="cell-data">12 Oct</span><span
													class="note">04:23 PM</span></td>
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>
											<td class="cell">$59.00</td>

											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2')}}">View</a> <a
													class="btn-sm btn-danger" href="#">Delete</a>
											</td>
										</tr>

										<tr>
											<td class="cell">#15341</td>
											<td class="cell">Raymond Atkins</td>
											<td class="cell"><span class="cell-data">11 Oct</span><span
													class="note">11:18 AM</span></td>
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											<td class="cell">$678.26</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2')}}">View</a> <a
													class="btn-sm btn-danger" href="#">Delete</a>
											</td>
										</tr> --}}

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
											<th class="cell">Order Id</th>
											<th class="cell">Patient Name</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total Amount</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>
										{{-- <tr> --}}



											@if($from_where == 'searchComponent')
											@foreach($delivered as $order)

											@if($order->status == 'delivered')
											<tr>
											<td class="cell">#{{$order->id}}</td>
											<td class="cell">{{$order->u_name}}</td>
											<td class="cell">{{$order->placed_date}}</td>

											@if($order->status == 'pending')
											<td class="cell"><span class="badge bg-warning">Pending</span></td>
											@elseif($order->status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>

											@endif


											<td class="cell">${{$order->total}}</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a>

												<a class="btn-sm btn-danger"
													href="{{url('/deleteOrder',$order->id)}}">Delete</a>


												<a class="btn-sm btn-success"
													href="{{url('api/invoice',$order->id)}}">Invoice</a>

											</td>
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
																href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/pending' )}}">Pending</a>
														</li>
													</div>
												</div>
											</td>


											</tr>
											@endif


										@endforeach
										@else
										@foreach($delivered as $order)

										<tr>
											<td class="cell">#{{$order->id}}</td>
											<td class="cell">{{$order->user->name}}</td>
											<td class="cell">{{$order->placed_date}}</td>

											@if($order->status == 'pending')
											<td class="cell"><span class="badge bg-warning">Pending</span></td>
											@elseif($order->status == 'delivered')
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											@elseif($order->status == 'cancelled')
											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>

											@endif


											<td class="cell">${{$order->total}}</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a>

												<a class="btn-sm btn-danger"
													href="{{url('/deleteOrder',$order->id)}}">Delete</a>


												<a class="btn-sm btn-success"
													href="{{url('api/invoice',$order->id)}}">Invoice</a>

											</td>
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
																href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/delivered' )}}">Delivered</a>
														</li>
														<a
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
														</li>
														<li>
															<a
																href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/pending' )}}">Pending</a>
														</li>
													</div>
												</div>
											</td>


										</tr>


										@endforeach
										@endif

										{{-- @foreach($deliveredas $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											<td class="cell"><span class="badge bg-success">Delivered</span></td>




											<td class="cell">${{$order->total}}</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a>

												<a class="btn-sm btn-danger"
													href="{{url('/deleteOrder',$order->id)}}">Delete</a>

												<a class="btn-sm btn-success"
													href="{{url('api/invoice',$order->id)}}">Invoice</a>

											</td>
										</tr>
										@endforeach --}}



										{{-- </tr> --}}

										{{-- <tr>
											<td class="cell">#15344</td>
											<td class="cell">Muhammad Ayub</td>
											<td class="cell"><span class="cell-data">16 Oct</span><span
													class="note">01:16 AM</span></td>
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											<td class="cell">$123.00</td>
											<td class="cell"><a class="btn-sm btn-danger" href="#">Delete</a></td>
											</td>
										</tr> --}}

										{{-- <tr>
											<td class="cell">#15343</td>
											<td class="cell">Jayden Massey</td>
											<td class="cell"><span class="cell-data">15 Oct</span><span
													class="note">8:07 PM</span></td>
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											<td class="cell">$199.00</td>
											<td class="cell"><a class="btn-sm btn-danger" href="#">Delete</a></td>
											</td>
										</tr>


										<tr>
											<td class="cell">#15341</td>
											<td class="cell">Raymond Atkins</td>
											<td class="cell"><span class="cell-data">11 Oct</span><span
													class="note">11:18 AM</span></td>
											<td class="cell"><span class="badge bg-success">Delivered</span></td>
											<td class="cell">$678.26</td>
											<td class="cell"><a class="btn-sm btn-danger" href="#">Delete</a></td>

										</tr> --}}

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
											<th class="cell">Order Id</th>
											<th class="cell">Patient Name</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total Amount</th>
											<th class="cell">Actions</th>
										</tr>
									</thead>
									<tbody>

										@if($from_where == 'searchComponent')
										@foreach($pending as $order)
										@if($order->status == 'pending')
									<tr>
										<td class="cell">#{{$order->id}}</td>
										<td class="cell">{{$order->u_name}}</td>
										<td class="cell">{{$order->placed_date}}</td>

										@if($order->status == 'pending')
										<td class="cell"><span class="badge bg-warning">Pending</span></td>
										@elseif($order->status == 'delivered')
										<td class="cell"><span class="badge bg-success">Delivered</span></td>
										@elseif($order->status == 'cancelled')
										<td class="cell"><span class="badge bg-danger">Cancelled</span></td>

										@endif


										<td class="cell">${{$order->total}}</td>
										<td class="cell"><a class="btn-sm app-btn-secondary"
												href="{{url('/orderdetails2',$order->id)}}">View</a>

											<a class="btn-sm btn-danger"
												href="{{url('/deleteOrder',$order->id)}}">Delete</a>


											<a class="btn-sm btn-success"
												href="{{url('api/invoice',$order->id)}}">Invoice</a>

										</td>
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
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/delivered' )}}">Delivered</a>
													</li>
													<a
														href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
													</li>
													<li>
														<a
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/pending' )}}">Pending</a>
													</li>
												</div>
											</div>
										</td>


									</tr>
									@endif

									@endforeach
									@else
									@foreach($pending as $order)

									<tr>
										<td class="cell">#{{$order->id}}</td>
										<td class="cell">{{$order->user->name}}</td>
										<td class="cell">{{$order->placed_date}}</td>

										@if($order->status == 'pending')
										<td class="cell"><span class="badge bg-warning">Pending</span></td>
										@elseif($order->status == 'delivered')
										<td class="cell"><span class="badge bg-success">Delivered</span></td>
										@elseif($order->status == 'cancelled')
										<td class="cell"><span class="badge bg-danger">Cancelled</span></td>

										@endif


										<td class="cell">${{$order->total}}</td>
										<td class="cell"><a class="btn-sm app-btn-secondary"
												href="{{url('/orderdetails2',$order->id)}}">View</a>

											<a class="btn-sm btn-danger"
												href="{{url('/deleteOrder',$order->id)}}">Delete</a>


											<a class="btn-sm btn-success"
												href="{{url('api/invoice',$order->id)}}">Invoice</a>

										</td>
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
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/delivered' )}}">Delivered</a>
													</li>
													<a
														href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
													</li>
													<li>
														<a
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/pending' )}}">Pending</a>
													</li>
												</div>
											</div>
										</td>


									</tr>


									@endforeach
									@endif



										{{-- @foreach($pending as $order)
										<tr>
											<td class="cell">#{{$order->id}}</td>
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											<td class="cell"><span class="badge bg-warning">Pending</span></td>




											<td class="cell">${{$order->total}}</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a>

												<a class="btn-sm btn-danger"
													href="{{url('/deleteOrder',$order->id)}}">Delete</a>

												<a class="btn-sm btn-success"
													href="{{url('api/invoice',$order->id)}}">Invoice</a>

											</td>
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
											<th class="cell">Order Id</th>
											<th class="cell">Patient Name</th>
											<th class="cell">Date</th>
											<th class="cell">Status</th>
											<th class="cell">Total Amount</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>



										@if($from_where == 'searchComponent')
										@foreach($cancelled as $order)
										@if($order->status == 'cancelled')

									<tr>
										<td class="cell">#{{$order->id}}</td>
										<td class="cell">{{$order->u_name}}</td>
										<td class="cell">{{$order->placed_date}}</td>

										@if($order->status == 'pending')
										<td class="cell"><span class="badge bg-warning">Pending</span></td>
										@elseif($order->status == 'delivered')
										<td class="cell"><span class="badge bg-success">Delivered</span></td>
										@elseif($order->status == 'cancelled')
										<td class="cell"><span class="badge bg-danger">Cancelled</span></td>

										@endif


										<td class="cell">${{$order->total}}</td>
										<td class="cell"><a class="btn-sm app-btn-secondary"
												href="{{url('/orderdetails2',$order->id)}}">View</a>

											<a class="btn-sm btn-danger"
												href="{{url('/deleteOrder',$order->id)}}">Delete</a>


											<a class="btn-sm btn-success"
												href="{{url('api/invoice',$order->id)}}">Invoice</a>

										</td>
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
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/delivered' )}}">Delivered</a>
													</li>
													<a
														href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
													</li>
													<li>
														<a
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/pending' )}}">Pending</a>
													</li>
												</div>
											</div>
										</td>


									</tr>

									@endif
									@endforeach
									@else
									@foreach($cancelled as $order)

									<tr>
										<td class="cell">#{{$order->id}}</td>
										<td class="cell">{{$order->user->name}}</td>
										<td class="cell">{{$order->placed_date}}</td>

										@if($order->status == 'pending')
										<td class="cell"><span class="badge bg-warning">Pending</span></td>
										@elseif($order->status == 'delivered')
										<td class="cell"><span class="badge bg-success">Delivered</span></td>
										@elseif($order->status == 'cancelled')
										<td class="cell"><span class="badge bg-danger">Cancelled</span></td>

										@endif


										<td class="cell">${{$order->total}}</td>
										<td class="cell"><a class="btn-sm app-btn-secondary"
												href="{{url('/orderdetails2',$order->id)}}">View</a>

											<a class="btn-sm btn-danger"
												href="{{url('/deleteOrder',$order->id)}}">Delete</a>


											<a class="btn-sm btn-success"
												href="{{url('api/invoice',$order->id)}}">Invoice</a>

										</td>
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
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/delivered' )}}">Delivered</a>
													</li>
													<a
														href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/cancelled' )}}">Cancelled</a>
													</li>
													<li>
														<a
															href="{{ url('updatePharmacyOrderStatus/' . $order->id . '/pending' )}}">Pending</a>
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
											<td class="cell">{{$order->user->name}}</td>

											<td class="cell">{{$order->placed_date}}</td>

											<td class="cell"><span class="badge bg-danger">Cancelled</span></td>



											<td class="cell">${{$order->total}}</td>
											<td class="cell"><a class="btn-sm app-btn-secondary"
													href="{{url('/orderdetails2',$order->id)}}">View</a>

												<a class="btn-sm btn-danger"
													href="{{url('/deleteOrder',$order->id)}}">Delete</a>

												<a class="btn-sm btn-success"
													href="{{url('api/invoice',$order->id)}}">Invoice</a>

											</td>
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