<!DOCTYPE html>
<html lang="en">

<head>
	<title>Order Details-Care Companion</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" >
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
	<div class="app">
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
						<div class="search-mobile-trigger d-sm-none col">
							<i class="search-mobile-trigger-icon fas fa-search"></i>
						</div>
						<!--//col-->
						<div class="app-search-box col">
							<form class="app-search-form" method="post" action="{{url('Admin_Search')}}">
								@csrf
								<input type="hidden" placeholder="{{$search_helper}}" name="helper" value="{{$search_helper}}"
									class="form-control search-input">

								<input type="text" placeholder="Search..." name="search"
									class="form-control search-input">
								<button type="submit" class="btn search-btn btn-primary" value="Search"><i
										class="fas fa-search"></i></button>
							</form>
						</div>
						<!--//app-search-box-->

						<div class="app-utilities col-auto">
							<div class="app-utility-item app-notifications-dropdown dropdown">
								<a href="{{url('/adminchat')}}" role="button" aria-expanded="false"
									title="Notifications">
									
									<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
									<svg width="22" height="22" viewBox="0 0 16 16" class="bi bi-chat"
										fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>

										
									</svg>
									<span class="icon-badge" style="margin-right: 4em;">3</span>

									
								</a>
								
								

								

								<a class="dropdown-toggle no-toggle-arrow m-2" id="notifications-dropdown-toggle"
									data-bs-toggle="dropdown" href=# role="button" aria-expanded="false"
									title="Notifications">
									<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
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
														<div class="desc">Amy shared a file with you. Lorem ipsum dolor
															sit amet, consectetur adipiscing elit. </div>
														<div class="meta"> 2 hrs ago</div>
													</div>
												</div>
												<!--//col-->
											</div>
											<!--//row-->
											<a class="link-mask" href="{{url('/adminnotifications')}}"></a>
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
											<a class="link-mask" href="{{url('/adminnotifications')}}"></a>
										</div>
										<!--//item-->
										<div class="item p-3">
											<div class="row gx-2 justify-content-between align-items-center">
												<div class="col-auto">
													
												</div>
												<!--//col-->
												<div class="col">
													<div class="info">
														<div class="desc">Your report is ready. Proin venenatis interdum
															est.</div>
														<div class="meta"> 3 days ago</div>
													</div>
												</div>
												<!--//col-->
											</div>
											<!--//row-->
											<a class="link-mask" href="{{url('/adminnotifications')}}"></a>
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
											<a class="link-mask" href="{{url('/adminnotifications')}}"></a>
										</div>
										<!--//item-->
									</div>
									<!--//dropdown-menu-content-->

									<div class="dropdown-menu-footer p-2 text-center">
										<a href="{{url('/adminnotifications')}}">View all</a>
									</div>

								</div>
								<!--//dropdown-menu-->
							</div>
							<!--//app-utility-item-->


							<div class="app-utility-item app-user-dropdown dropdown">
								<a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#"
									role="button" aria-expanded="false"><img src="{{asset('assets/images/users/admin-ui.png')}}"
										alt="user profile"></a>
								<ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
									<li>
										<hr class="dropdown-divider">
									</li>
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
					<a class="app-logo" href="{{url('/adminhome')}}"><img class="logo-icon me-2" src="{{asset('assets/images/app-logo.svg')}}"
							alt="Care companion Logo"></a>

				</div>
				<!--//app-branding-->

				<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link active" href="{{url('/adminhome')}}">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                        <path fill-rule="evenodd"
                                            d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Overview</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                        <!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="{{url('/adminproducts')}}">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z" />
                                        <path fill-rule="evenodd"
                                            d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Products</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                        <!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="{{url('/adminorders')}}">
                                <span class="nav-icon">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                        <path fill-rule="evenodd"
                                            d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                                        <circle cx="3.5" cy="5.5" r=".5" />
                                        <circle cx="3.5" cy="8" r=".5" />
                                        <circle cx="3.5" cy="10.5" r=".5" />
                                    </svg>
                                </span>
                                <span class="nav-link-text">Orders</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                        <!--//nav-item-->


                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="{{url('/admindelivery')}}">
                                <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
										<path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
									  </svg>
                                </span>
                                <span class="nav-link-text">Delivery</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                        <!--//nav-item-->


                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="{{url('/adminpharmacy')}}">
                                <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"  fill="currentColor" class="bi bi-shield-plus" viewBox="0 0 16 16">
										<path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
										<path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z"/>
									  </svg>
                                </span>
                                <span class="nav-link-text">Pharmacy</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                        <!--//nav-item-->



                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="{{url('/adminuser')}}">
                                <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
										<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
									  </svg>
                                </span>
                                <span class="nav-link-text">Users</span>
                            </a>
                            <!--//nav-link-->
                        </li>
                        <!--//nav-item-->


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


                            {{-- <table class="table table-hover">
                                <tr>
                                  <th>Id</th>
                                  <td>01</td>
                                </tr>
                                <tr>
                                  <th>Order Id</th>
                                  <td>044</td>
                                </tr>
                                <tr>
                                    <th>Medicine</th>
                                    <td>Panadol</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>Rs.20</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>3 Box</td>
                                </tr>
                              </table> --}}
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