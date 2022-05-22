@extends('layouts.adminmain')
@section('main-container')

<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="p-4 bg-white rounded">
                <h1 class="app-page-title">Add Pharmacy</h1>

                <div class="all-form-element-inner">
                    {{-- <form action="{{url('rider.add')}}" method="post" enctype="multipart/form-data"> --}}
                    <form action="{{url('admin_add_pharmacy')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="">
                            @if(Session::has('message'))
                            <p  style="width: 70%;
                            margin: auto; margin-bottom:30px;"
                            class="my_para_danger alert alert-danger">{{ Session::get('message') }}
                            </p>
                            @endif
                        </div>
                        <div class="">
                            @if(Session::has('message_success'))
                            <p  style="width: 70%;
                            margin: auto; margin-bottom:30px;"
                            class="my_para_danger alert alert-success">{{ Session::get('message_success') }}
                            </p>
                            @endif
                        </div>
                        <div class="">
                            @if(Session::has('message_salary'))
                            <p  style="width: 70%;
                            margin: auto; margin-bottom:30px;"
                            class="my_para_danger alert alert-danger">{{ Session::get('message_salary') }}
                            </p>
                            @endif
                        </div>
                        


                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Name</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="name" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Image</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="file" name="image" class="form-control my_img" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Address</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="address" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">city</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="city" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Contact</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="contact" class="form-control" />
                                </div>
                            </div>
                        </div>
                        

                        {{-- <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Area ID</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="area" class="form-control" />
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Account ID</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="account" class="form-control" />
                                </div>
                            </div>
                        </div>
{{--                         
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Designation</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="designation" class="form-control" />
                                </div>
                            </div>
                        </div> --}}


                        <div class="form-group-inner">
                            <div class="login-btn-inner">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-9">
                                        <div class="login-horizental cancel-wp pull-left">
                                            {{-- <button class="btn btn-white" type="submit">Cancel</button> --}}
                                            <button class="btn btn-sm btn-primary login-submit-cs"
                                                type="submit">Save Change</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

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