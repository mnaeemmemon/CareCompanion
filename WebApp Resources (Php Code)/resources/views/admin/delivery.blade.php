@extends('layouts.adminmain')
@section('main-container')
    
<div class="app-wrapper">

<div class="app-content pt-3 p-md-3 p-lg-4">
	<div class="container-xl">
		<div class="p-4 bg-white rounded">
			<h1 class="app-page-title">Riders</h1>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Id</th>
							<th scope="col">Account name</th>
							<th scope="col">Area</th>
							<th scope="col">Name</th>
							<th scope="col">Contact</th>
							<th scope="col">Image</th>
							<th scope="col">Contact</th>
							<th scope="col">Actions</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

						@foreach($delivery_boys as $d)
							<tr>
								<td>#{{$d->id}}</td>
								<td>{{$d->username}}</td>
								<td>{{$d->area->Area}}</td>
								<td>{{$d->name}}</td>
								<td>{{$d->contact}}</td>

								<td><img src="{{asset('images/delivery_boy_images/'.$d->image.'')}}"
									style="width: 5em;"></td>

								{{-- <td><img src="assets/images/Downloads/Faseeh.jpg" style="width: 5em;"> </td> --}}


								<td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>

								<td>

									<a href="{{ url('AdminUpdateRider',$d->id) }}">
										<img src="{{asset('img/core-img/upd.jpg')}}" style="width: 26px;" alt="">
									</a>

									<a href="{{ url('AdminDeleteRider',$d->id) }}">
										<img src="{{asset('img/core-img/del3.jpg')}}" style="width: 26px;" alt="">
									</a>
								</td>
							</tr>


						@endforeach


						{{-- <tr>
							<td>1</td>
							<td>Irfan_1</td>
							<td>North Nazimabad</td>
							<td>Irfan</td>
							<td>03445256982</td>
							<td><img src="assets/images/Downloads/Faseeh.jpg" style="width: 5em;"> </td>
							<td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>
						</tr> --}}
						{{-- <tr>
							<td>2</td>
							<td>omaid_2</td>
							<td>DHA</td>
							<td>Omaid</td>
							<td>03359860565</td>
							<td><img src="assets/images/Downloads/NAeem.jpg" style="width: 5em;"> </td>
							<td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>
						</tr>
						<tr>

							<td>3</td>
							<td>Mahmood_3</td>
							<td>Johar</td>
							<td>Mahmood</td>
							<td>031503235854</td>
							<td><img src="assets/images/Downloads/download.jpg" style="width: 5em;"> </td>
							<td><a href="{{url('/adminchat')}}"><button class="btn btn-primary">Contact</button></a></td>
						</tr> --}}

					</tbody>
				</table>
			</div>


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