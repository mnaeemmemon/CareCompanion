<!DOCTYPE html>
<html lang="en">

<head>
	<title>Order Details- Care companion</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description">
	<meta name="author">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FontAwesome JS-->
	<script defer src="{{asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="{{asset('assets/css/portal.css')}}">

</head>

<body>
	<!-- 	
	<div class="loader_bg">
		<div class="loader"></div>
	</div> -->
	<div class="app" id="backg">


		<header class="app-header fixed-top">
			<div class="app-header-inner">
				<div class="container-fluid py-2">
					<div class="app-header-content">
						<div class="row justify-content-between align-items-center">

							<div class="col-auto">
								<a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
									<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
										role="img">
										<title>Menu</title>
										<path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
											stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
									</svg>
								</a>
							</div>
							<!--//col-->
							{{-- <div class="search-mobile-trigger d-sm-none col">
								<i class="search-mobile-trigger-icon fas fa-search"></i>
							</div>
							<!--//col-->
							<div class="app-search-box col">
								<form class="app-search-form">
									<input type="text" placeholder="Search..." name="search"
										class="form-control search-input">
									<button type="submit" class="btn search-btn btn-primary" value="Search"><i
											class="fas fa-search"></i></button>
								</form>
							</div> --}}

							<div class="app-search-box col">
								<form class="app-search-form" method="post" action="{{url('Pharmacy_Search')}}">
									@csrf
									<input type="hidden" placeholder="{{$search_helper}}" name="helper" value="{{$search_helper}}"
										class="form-control search-input">
	
									<input type="text" placeholder="Search..." name="search"
										class="form-control search-input">
										
									<button type="submit" class="btn search-btn btn-primary" value="Search"><i
											class="fas fa-search"></i></button>
								</form>
							</div>


							<div class="app-utilities col-auto">
								<div class="app-utility-item app-notifications-dropdown dropdown">

									<a href="{{url('/pharmacychat')}}" class="mx-2" role="button" aria-expanded="false"
										title="chat">
										<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
										<svg width="22" height="22" viewBox="0 0 16 16" class="bi bi-chat"
											fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path
												d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />


										</svg>
										<span class="icon-badge" style="margin-right: 3.5em;">3</span>
									</a>


									<a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle"
										data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"
										title="Notifications">

										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon"
											fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
											<path fill-rule="evenodd"
												d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
										</svg>
										<span class="icon-badge">3</span>
									</a>
									<!--//dropdown-toggle-->

									<div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
										<div class="dropdown-menu-header p-3">
											<h5 class="dropdown-menu-title mb-0">Notifications</h5>
										</div>
										<!--//dropdown-menu-title-->
										<div class="dropdown-menu-content">
											<div class="item p-3">
												<div class="row gx-2 justify-content-between align-items-center">
													<div class="col-auto">

													</div>
													<!--//col-->
													<div class="col">
														<div class="info">
															<div class="desc">Amy shared a file with you. Lorem ipsum
																dolor
																sit amet, consectetur adipiscing elit. </div>
															<div class="meta"> 2 hrs ago</div>
														</div>
													</div>
													<!--//col-->
												</div>
												<!--//row-->
												<a class="link-mask" href="{{url('/pharmacynotifications')}}"></a>
											</div>
											<!--//item-->
											<div class="item p-3">
												<div class="row gx-2 justify-content-between align-items-center">
													<div class="col-auto">

													</div>
													<!--//col-->
													<div class="col">
														<div class="info">
															<div class="desc">You have a new invoice. Proin venenatis
																interdum est.</div>
															<div class="meta"> 1 day ago</div>
														</div>
													</div>
													<!--//col-->
												</div>
												<!--//row-->
												<a class="link-mask" href="{{url('/pharmacynotifications')}}"></a>
											</div>
											<!--//item-->
											<div class="item p-3">
												<div class="row gx-2 justify-content-between align-items-center">
													<div class="col-auto">

													</div>
													<!--//col-->
													<div class="col">
														<div class="info">
															<div class="desc">Your report is ready. Proin venenatis
																interdum
																est.</div>
															<div class="meta"> 3 days ago</div>
														</div>
													</div>
													<!--//col-->
												</div>
												<!--//row-->
												<a class="link-mask" href="{{url('/pharmacynotifications')}}"></a>
											</div>
											<!--//item-->
											<div class="item p-3">
												<div class="row gx-2 justify-content-between align-items-center">
													<div class="col-auto">

													</div>
													<!--//col-->
													<div class="col">
														<div class="info">
															<div class="desc">James sent you a new message.</div>
															<div class="meta"> 7 days ago</div>
														</div>
													</div>
													<!--//col-->
												</div>
												<!--//row-->
												<a class="link-mask" href="{{url('/pharmacynotifications')}}"></a>
											</div>
											<!--//item-->
										</div>
										<!--//dropdown-menu-content-->

										<div class="dropdown-menu-footer p-2 text-center">
											<a href="{{url('/pharmacynotifications')}}">View all</a>
										</div>

									</div>
									<!--//dropdown-menu-->
								</div>
								<!--//app-utility-item-->


								<div class="app-utility-item app-user-dropdown dropdown">
									<a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
										href="#" role="button" aria-expanded="false"><img
											src="../assets/images/user.png" alt="user profile"></a>
									<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="{{url('/pharmacyaccset')}}">Account
												Settings</a></li>

										<li><a class="dropdown-item" href="{{url('/')}}">Log Out</a></li>
									</ul>
								</div>
								<!--//app-user-dropdown-->
							</div>
							<!--//app-utilities-->
						</div>
						<!--//row-->
					</div>
					<!--//app-header-content-->
				</div>
				<!--//container-fluid-->
			</div>
			<!--//app-header-inner-->
			<div id="app-sidepanel" class="app-sidepanel">
				<div id="sidepanel-drop" class="sidepanel-drop"></div>
				<div class="sidepanel-inner d-flex flex-column">
					<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
					<div class="app-branding">
						<a class="app-logo" href="{{url('/pharmacyhome')}}"><img class="logo-icon me-2"
								src="{{asset('assets/images/app-logo.svg')}}" alt="logo"></a>

					</div>
					<!--//app-branding-->

					<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
						<ul class="app-menu list-unstyled accordion" id="menu-accordion">
							<li class="nav-item">

								<a class="nav-link active" href="{{url('/pharmacyhome')}}">
									<span class="nav-icon">
										<img src="{{asset('assets/images/icons/home.png')}}">
									</span>
									<span class="nav-link-text">Overview</span>
								</a>
								<!--//nav-link-->
							</li>
							<!--//nav-item-->

							<li class="nav-item has-submenu">
								<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
								<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse"
									data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
									<span class="nav-icon">
										<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
										<img src="{{asset('assets/images/icons/drugs-capsules-and-pills.png')}}">
									</span>
									<span class="nav-link-text ">Product</span>
									<span class="submenu-arrow">
										<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
											fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd"
												d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
										</svg>
									</span>
									<!--//submenu-arrow-->
								</a>
								<!--//nav-link-->
								<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
									<ul class="submenu-list list-unstyled">
										<li class="submenu-item"><a class="submenu-link"
												href="{{url('/pharmacyaddmedicine')}}">Add Product</a></li>
										{{-- <li class="submenu-item"><a class="submenu-link"
												href="{{url('/pharmacyupdatemedicine')}}">Update Product</a></li> --}}
										<li class="submenu-item"><a class="submenu-link"
												href="{{url('/pharmacyaddcategory')}}">Add Category</a></li>
										<li class="submenu-item"><a class="submenu-link"
												href="{{url('/api/pharmacylist')}}">Product List</a></li>


									</ul>
								</div>
							</li>
							<li class="nav-item">

								<a class="nav-link" href="{{url('/pharmacysales')}}">
									<span class="nav-icon">
										<img src="{{asset('assets/images/icons/shopping-bag.png')}}">
									</span>
									<span class="nav-link-text">Orders</span>
								</a>
								<!--//nav-link-->
							</li>
							<!--//nav-item-->

							<li class="nav-item">

								<a class="nav-link" href="{{url('/pharmacysalesor')}}">
									<span class="nav-icon">
										<img src="{{asset('assets/images/icons/sales.png')}}">
									</span>
									<span class="nav-link-text">Sales</span>
								</a>
								<!--//nav-link-->
							</li>
							<!--//nav-item-->


							<li class="nav-item">

								<a class="nav-link" href="{{url('/pharmacydelivery')}}">
									<span class="nav-icon">
										<img src="{{asset('assets/images/icons/package-box.png')}}">
									</span>
									<span class="nav-link-text">Delivery</span>
								</a>
								<!--//nav-link-->
							</li>
							<!--//nav-item-->

							<li class="nav-item">

								<a class="nav-link" href="{{url('/pharmacyinvoice')}}">
									<span class="nav-icon">
										<img src="{{asset('assets/images/icons/shopping-bag.png')}}">
									</span>
									<span class="nav-link-text">Invoice</span>
								</a>
								<!--//nav-link-->
							</li>

						</ul>
						<!--//app-menu-->
					</nav>
					<!--//app-nav-->


				</div>
				<!--//sidepanel-inner-->
			</div>
			<!--//app-sidepanel-->
		</header>
		<!--//app-header-->
		<!--//app-header-->
		<div class="app-wrapper">

			<div class="app-content pt-3 p-md-3 p-lg-4">
				<div class="container-xl">
					<div class="p-4 bg-white rounded">
						<div class="row g-4 mb-4">
							<h1 class="app-page-title">Order Detail</h1>
							<hr>
							<div class="table-responsive">
								<table class="table table-hover">
									@foreach($orderDetails as $d)
									{{-- <div style="margin:10px;"> --}}
										<tr>
											<th>Id</th>
											<td>#{{$d->id}}</td>
										</tr>

										<tr>
											<th>Order Id</th>
											<td>#{{$d->order->id}}</td>
										</tr>
										<tr>
											<th>Medicine</th>
											<td>{{$d->product->name}}</td>
										</tr>
										<tr>
											<th>Total Amount</th>
											<td>{{$d->Amount}}</td>
										</tr>
										<tr>
											<th>Quantity</th>
											<td>{{$d->Quantity}} Box</td>
										</tr>
									{{-- </div> --}}
									@endforeach
								</table>
							</div>




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

	<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>

	<!-- Javascript -->
	<script src="{{asset('assets/plugins/popper.min.js')}}"></script>
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>



	<!-- Charts JS -->
	<script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script>
	<script src="{{asset('assets/js/charts-demo.js')}}"></script>

	<!-- Page Specific JS -->
	<script src="{{asset('assets/js/app.js')}}"></script>

</body>

</html>