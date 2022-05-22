<@extends('layouts.pharmacymain')
@section('main-container')

<div class="app-wrapper">

<div class="app-content pt-3 p-md-3 p-lg-4">
  <div class="container-xl">

	<div class="row g-3 mb-4 align-items-center justify-content-between">
		<div class="p-4 bg-white rounded">

	  <div class="col-auto">
		<h1 class="app-page-title mb-0">Chat</h1>
	  </div>
		</div>
	






	</div>
	
	<div class="row clearfix">
				<div class="col-lg-12">
					<div class="card chat-app">
						<div id="plist" class="people-list">
							<div class="input-group">
								
								<input type="text" class="form-control" placeholder="Search...">
							</div>
							<ul class="list-unstyled chat-list mt-2 mb-0">
								<li class="clearfix">
									<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
									<div class="about">
										<div class="name">Vincent Porter</div>
										<div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
									</div>
								</li>
								<li class="clearfix active">
									<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
									<div class="about">
										<div class="name">Aiden Chavez</div>
										<div class="status"> <i class="fa fa-circle online"></i> online </div>
									</div>
								</li>
								<li class="clearfix">
									<img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
									<div class="about">
										<div class="name">Mike Thomas</div>
										<div class="status"> <i class="fa fa-circle online"></i> online </div>
									</div>
								</li>                                    
								<li class="clearfix">
									<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
									<div class="about">
										<div class="name">Christian Kelly</div>
										<div class="status"> <i class="fa fa-circle offline"></i> left 10 hours ago </div>
									</div>
								</li>
								<li class="clearfix">
									<img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="avatar">
									<div class="about">
										<div class="name">Monica Ward</div>
										<div class="status"> <i class="fa fa-circle online"></i> online </div>
									</div>
								</li>
								<li class="clearfix">
									<img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="avatar">
									<div class="about">
										<div class="name">Dean Henry</div>
										<div class="status"> <i class="fa fa-circle offline"></i> offline since Oct 28 </div>
									</div>
								</li>
							</ul>
						</div>
						<div class="chat">
							<div class="chat-header clearfix">
								<div class="row">
									<div class="col-lg-6">
										<a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
											<img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
										</a>
										<div class="chat-about">
											<h6 class="m-b-0">Aiden Chavez</h6>
											<small>Last seen: 2 hours ago</small>
										</div>
									</div>
									
								</div>
							</div>
							<div class="chat-history">
								<ul class="m-b-0">
									<li class="clearfix">
										<div class="message-data">
											<span class="float-right">10:10 AM, Today</span>
										</div>
										<br>
										<div class="message other-message float-right my-1"> Hi Aiden, how are you? How is the project coming along? </div>
									</li>
									<li class="clearfix">
										<div class="message-data">
											<span class="message-data-time">10:12 AM, Today</span>
										</div>
										<div class="message my-message">Are we meeting today?</div>                                    
									</li>                               
									<li class="clearfix">
										<div class="message-data">
											<span class="message-data-time">10:15 AM, Today</span>
										</div>
										<div class="message my-message">Project has been already finished and I have results to show you.</div>
									</li>
								</ul>
							</div>
							<div class="chat-message clearfix">
								<div class="input-group mb-0">
									<input type="text" class="form-control" placeholder="Enter text here...">                                    
			
									<div class="input-group-prepend">
										<span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154l.215.338 7.494-7.494Z"/>
										  </svg></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<!--//row-->














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

</body>

</html>

@endsection