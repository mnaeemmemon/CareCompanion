<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sign up-Care Companion</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Sign up-Care Companion">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FontAwesome JS-->
	<script defer src="../assets/plugins/fontawesome/js/all.min.js"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="../assets/css/portal.css">

</head>

<body class="app app-signup p-0" id="backg">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto" style="margin-top:-60px;">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="../Pharmacy panel/home.html"><img
								class="logo-icon me-2" src="../assets/images/app-logo.svg" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Sign up to Pharmacy Portal</h2>

					@if(Session::has('message'))
					<p class="alert alert-info">{{ Session::get('message') }}</p>
					@endif


					<div class="auth-form-container text-start mx-auto">
						{{-- <form action="{{ route('register.custom') }}" method="POST"> --}}
							<form action="{{ route('register.custom.pharmacy') }}" method="POST">
								@csrf
								<div class="form-group mb-3">
									<input type="text" placeholder="Name" id="name" class="form-control" name="name"
										required autofocus>
									@if ($errors->has('name'))
									<span class="text-danger">{{ $errors->first('name') }}</span>
									@endif
								</div>




								<div class="form-group mb-3">
									<input type="text" placeholder="Email" id="email_address" class="form-control"
										name="email" required autofocus>
									@if ($errors->has('email'))
									<span class="text-danger">{{ $errors->first('email') }}</span>
									@endif
								</div>


								<div class="form-group mb-3">
									<input type="password" placeholder="Password" id="password" class="form-control"
										name="password" required>
									@if ($errors->has('password'))
									<span class="text-danger">{{ $errors->first('password') }}</span>
									@endif
								</div>

								<h2 class="auth-heading text-center mb-4">Account Info</h2>

								<div class="form-group mb-3">
									<input type="text" placeholder="Beneficiary Name..." id="password" class="form-control"
										name="ben_name" >
									@if ($errors->has('ben_name'))
									<span class="text-danger">{{ $errors->first('ben_name') }}</span>
									@endif
								</div>

								<div class="form-group mb-3">
									<input type="text" placeholder="Bank Name..." id="password" class="form-control"
										name="bank_name" >
									@if ($errors->has('bank_name'))
									<span class="text-danger">{{ $errors->first('bank_name') }}</span>
									@endif
								</div>

								<div class="form-group mb-3">
									<input type="text" placeholder="Account No..." id="password" class="form-control"
										name="account_no" >
									@if ($errors->has('account_no'))
									<span class="text-danger">{{ $errors->first('account_no') }}</span>
									@endif
								</div>

								<div class="form-group mb-3">
									<input type="text" placeholder="Amount..." id="password" class="form-control"
										name="amount" >
									{{-- @if ($errors->has('password'))
									<span class="text-danger">{{ $errors->first('password') }}</span>
									@endif --}}
								</div>
								{{-- <div class="form-group mb-3">
									<input type="text" placeholder="Account ID" id="account_id" class="form-control"
										name="account_id" required autofocus>
									@if ($errors->has('account_id'))
									<span class="text-danger">{{ $errors->first('account_id') }}</span>
									@endif
								</div> --}}

								<div class="form-group mb-3">
									<div class="checkbox">
										<label><input type="checkbox" name="remember"> Remember Me</label>
									</div>
								</div>
								{{-- <div class="d-grid mx-auto">
									<button type="submit" class="btn btn-dark btn-block">Sign up</button>
								</div> --}}
								<div class="text-center">
									<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
										Up</button>
								</div>
							</form>


							{{-- <form class="auth-form auth-signup-form">
								<div class="email mb-3">
									<label class="sr-only" for="signup-email">Your Name</label>
									<input id="signup-name" name="signup-name" type="text"
										class="form-control signup-name" placeholder="Full name" required="required">
								</div>
								<div class="email mb-3">
									<label class="sr-only" for="signup-email">Your Email</label>
									<input id="signup-email" name="signup-email" type="email"
										class="form-control signup-email" placeholder="Email" required="required">
								</div>
								<div class="password mb-3">
									<label class="sr-only" for="signup-password">Password</label>
									<input id="signup-password" name="signup-password" type="password"
										class="form-control signup-password" placeholder="Create a password"
										required="required">
								</div>
								<div class="extra mb-3">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="RememberPassword">
										<label class="form-check-label" for="RememberPassword">
											I agree to Portal's <a href="#" class="app-link">Terms of Service</a> and <a
												href="#" class="app-link">Privacy Policy</a>.
										</label>
									</div>
								</div>
								<!--//extra-->

								<div class="text-center">
									<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign
										Up</button>
								</div>
							</form>
							<!--//auth-form--> --}}

							<div class="auth-option text-center pt-5">Already have an account? <a class="text-link"
									href="{{url('/')}}">Log in</a></div>
					</div>
					<!--//auth-form-container-->



				</div>
				<!--//auth-body-->

			</div>
			<!--//flex-column-->
		</div>
		<!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100 text-center" style="margin-top:9em;">
						<img src="{{url('/assets/images/logo copy.png')}}" class="w-25">
						<h1 class="shadow p-4 mb-5 rounded bg-white" style="color: #008080;">Care Companion</h1>
					</div>

				</div>
			</div>
			<!--//auth-background-overlay-->
		</div>
		<!--//auth-background-col-->

	</div>
	<!--//row-->


	


</body>

</html>